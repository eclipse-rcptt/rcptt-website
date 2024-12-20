---
title: ECL commands for XML import and export
slug: xml-import-export
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: ecl
---

## XML export

### {{< eclCommand write-xml-file >}}
Writes tables from input pipe to into xml file

Input:
- **tree** Tree: Tree to write
Parameters:
- **uri** String: URI to write xml data to. Currently supported schemes are workspace:/ for files in workspace and file:/ for files on local file system.

Output:
- The value of 'tree' argument

Example:

```ecl
proc newDevice [val id] [val name] [val target] {
    tree-node "Device"
        [map [entry "id" $id]]
        [tree-node -name "DeviceName" -text $name]
        [tree-node -name "DeviceTarget" -text $target]
}
 
 
global [val supportedDevices [tree-node "SupportedDevices"
    [newDevice "1" "device 1" "target 1"]
    [newDevice "2" "device 2" "target 2"]
    [newDevice "3" "device 3" "target 3"]
]]
 
global [val allDevices [tree-node "AllDevices"
    [newDevice "1" "device 1" "target 1"]
    [newDevice "2" "device 2" "target 2"]
    [newDevice "3" "device 3" "target 3"]
    [newDevice "4" "device 4" "target 4"]
    [newDevice "5" "device 5" "target 5"]
]]
 
global [val tree [
    tree-node "DevicesInfo" $supportedDevices $allDevices
]]
 
$tree | write-xml-file "workspace:/xml/devices.xml"
```

## XML import

### {{< eclCommand read-xml-file >}}
Parses a given xml file into tree and write it to output pipe. Fails if file is not found or if it is invalid xml.

Parameters:
- **uri** String: URI to read xml data from. Currently supported schemes are workspace:/ for files in workspace and file:/ for files on local file system.
- **xPath** String: XPath expression to find xml nodes

Output:
- Tree EMF Object

Example:

```ecl
proc logDevice [val device] {
    if [$device | has-attr "id"] {
        log [format "Device ID: %s" [$device | get-attr "id"]]
    }
    log [format "Device Name: %s" [$device | get-nodes "DeviceName" | get text]]
    log [format "Device Target: %s" [$device | get-nodes "DeviceTarget"  | get text]]
}
 
 
global [val supportedDevices [
    read-xml-file "workspace:/xml/devices.xml"
        | get-nodes "SupportedDevices" | get-nodes "Device" | to-list
]]
 
$supportedDevices | each [val device] {
    logDevice $device
}
```

## Additional commands

### {{< eclCommand tree-node >}}
Creates a new tree node

Input:
- **name** String: Name of the new node
- **attrs** optional EclMap: Map with node attributes
- **children** (0, ∞) Tree: Children of the new node
- **text** optional String: Text of the new node

Output:
- Tree EMF Object

Example:

```ecl
tree-node "Device"
    [map [entry "id" "1"]]
    [tree-node -name "DeviceName" -text "device"]
    [tree-node -name "DeviceTarget" -text "target"]

```

### {{< eclCommand get-attrs >}}

Gets attributes from the object

Input:
- **object** EObject: Object to get attributes from

Output:
- Map with object attributes

Example:

```ecl
tree-node "Device" [map [entry "id" "1"] [entry "name" "first"]]
    | get-attrs | get "name" | log

```

### {{< eclCommand get-attr >}}
Gets attribute from the tree node by name. Fails if attribute is not found.

Input:
- **object** EObject: Object to get attribute from
Parameters:
- **name** String: Name of the attribute

Output:
- Value of the attribute

Example:

```ecl
tree-node "Device" [map [entry "id" "1"] [entry "name" "first"]]
    | get-attr "name" | log

```

### {{< eclCommand set-attr >}}

Sets value of the object attribute. If 'value' parameter is not specified, the attribute will be removed.

Input:
- **object** EObject: Object to set attribute to
Parameters:
- **name** String: Name of the attribute
- **value** optional String: New value of the attribute

Output:
- The value of 'object' argument

Example:

```ecl
tree-node "Device" [map [entry "id" "1"] [entry "name" "first"]]
    | set-attr "name" "second" | get-attr "name" | log

```

### {{< eclCommand has-attr >}}
Checks if the object has attribute

Input:
- **object** EObject: Object to check attribute from
Parameters:
- **name** String: Name of the attribute

Output:
- true when attribute is exist, false otherwise

Example:
```ecl
tree-node "Device" [map [entry "id" "1"] [entry "name" "first"]]
    | has-attr "name" | log

```

### {{< eclCommand get-nodes >}}
Gets child nodes from the object and writes them into output pipe. Fails if 'pos' of 'len' parameter is out of range.

Input:
- **object** EObject: Object to get child nodes from
Parameters:
- **name** optional String: Name of the nodes
- **pos** optional Int: Start position. If 'name' attribute is provided, 'pos' is relative to the node list filtered by name.
- **len** optional Int: Count of nodes. Default value is '-1' and it means the end of the node list. If 'name' attribute is provided, 'len' is relative to the node list filtered by name.

Output:
- Child nodes of the object

Example:

```ecl
proc newDevice [val id] [val name] [val target] {
    tree-node "Device"
        [map [entry "id" $id]]
        [tree-node -name "DeviceName" -text $name]
        [tree-node -name "DeviceTarget" -text $target]
}
 
global [val supportedDevices [tree-node "SupportedDevices"
    [newDevice "1" "device 1" "target 1"]
    [newDevice "2" "device 2" "target 2"]
    [newDevice "3" "device 3" "target 3"]
]]
 
$supportedDevices | get-nodes "Device" -pos 1 -len 1
    | get-nodes "DeviceName" | get text
    | equals "device 2" | verify-true

```

### {{< eclCommand append >}}

Adds child nodes to the object. Fails if 'index' parameter is out of range.

Input:
- **object** EObject: Object to add child nodes to
Parameters:
- **children** (1, ∞) Tree: New child nodes to add to the object
- **index** optional Int: Index of the first child node added in the node list. Min value is '0' and max value is size of node list. Default value is '-1' and it means size of node list.

Output:
- The value of 'object' argument

Example:

```ecl
tree-node "Device" [tree-node -name "DeviceName" -text "device"]
    | append [tree-node -name "DeviceTarget" -text "target"] -index 0


```

### {{< eclCommand remove >}}

Removes child node from the object by index. Fails if 'index' parameter is out of range.

Input:
- **object** EObject: Object to remove child node from
Parameters:
- **index** Int: Index of the child node. Min value is '0' and max value is the last index in the node list. Default value is '-1' and the last index in the node list.

Output:
- The value of 'object' argument

Example:

```ecl
tree-node "Device"
    [tree-node -name "DeviceName" -text "device"]
    [tree-node -name "DeviceTarget" -text "target"]
        | remove -index 1

```