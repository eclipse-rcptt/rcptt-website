---
title: ECL commands for Excel import and export 
slug: excel-import-export
sidebar: userguide
layout: doc
menu:
  sidebar:
      parent: ecl
---
## Export to Excel {{< eclCommand write-excel-file >}}

Writes tables from input pipe to into excel (xls or xlsx) file. Fails if file is not found or format is invalid.

Input:
- **tables** (1, ∞) Table: Tables to write

Parameters: 
- **uri** String: URI to write Excel data to. Currently supported schemes are workspace:/ for files in workspace and file:/ for files on local file system.
- **append** boolean: Whether to append given table data into file. Default value is false.


Output: 
- The value of 'tables' argument

Example: 

```ecl
global [val supportedDevices [list
    [list "Device Name" "Device Info"]
    [list "Device 1" "Info 1"]
    [list "Device 2" "Info 2"]
    [list "Device 3" "Info 3"]
]]
 
global [val allDevices [list
    [list "Device Name" "Device Info"]
    [list "Device 1" "Info 1"]
    [list "Device 2" "Info 2"]
    [list "Device 3" "Info 3"]
    [list "Device 4" "Info 4"]
    [list "Device 5" "Info 5"]
]]
 
 
proc newTable [val table] [val name] {
    $table | list-as-table-data | set-page-name $name
}
 
 
emit [newTable $supportedDevices "Supported devices"] [newTable $allDevices "All devices"]
    | write-excel-file "workspace:/excel/devices.xlsx"

```

## Import from Excel {{< eclCommand read-excel-file >}}

Parses given excel file (xls or xlsx) into tables and write them to output pipe. Fails if file is not found or format is invalid.

Parameters:
- **uri** String: URI to read Excel data from. Currently supported schemes are workspace:/ for files in workspace and file:/ for files on local file system.
- **sheets** (0, ∞) String: List of Excel sheet names to read data from

Output:
- List of Table EMF Objects

Example: 

```ecl
global [val devicesInfo [
    read-excel-file "workspace:/excel/devices.xlsx" "Supported devices" "All devices"
        | to-list
]]
 
 
clear-log-view
 
$devicesInfo | each [val table] {
    log [format "Page name: %s" [$table | get pageName]]
    $table | list [get rows] | each [val row] {
        $row | list [get values] | each [val value] {
            log $value
        }
    }
}
 
read-excel-file "workspace:/excel/devices.xlsx" "Additional info"
    | get rows | get values | log
```

## Additional commands

### {{< eclCommand set-page-name >}}

Set page name to table

Input:
- **table** Table: Table to set page name to

Parameters:
- **name** String: Page name to set

Output:

The value of 'table' argument

Example:

```ecl
get-view "Error Log" | get-tree | expand-all
get-view "Error Log" | get-tree | get-table-data
 | set-page-name "Table" | write-excel-file "workspace:/MyProject/AssertData/table.xls"
 
read-excel-file "workspace:/MyProject/AssertData/table.xls"
 | get-page-name | equals "Table" | assert-true

```

### {{< eclCommand list-as-table-data >}}

Converts input list to table data format

Input:
- **list** EclList: List of List of String to convert to Table

Output:
- Table EMF Object

Example:

```ecl
proc newTable [val table] [val name] {
    $table | list-as-table-data | set-page-name $name
}
 
global [val devices [list
    [list "Device Name" "Device Target"]
    [list "Device 1" "Info 1"]
    [list "Device 2" "Info 2"]
    [list "Device 3" "Info 3"]
]]
 
newTable $devices "Devices"
    | write-excel-file "workspace:/excel/devices.xls"

```

### {{< eclCommand get-table-cells >}}

Gets cell values by excel names and writes them into the output pipe

Input:
- **table** Table: Table to get cells from

Parameters:
- **cells** (1, ∞) String: Cell names

Output:
- Cell values

Example:
```ecl
read-excel-file "workspace:/excel/devices.xlsx" "Supported devices"
    | get-table-cells A1 | eq "Device Name" | verify-true

```

### {{< eclCommand get-table-range >}}
Gets range by excel name and writes it into the output pipe

Input:
- **table** Table: Table to get rows data from

Parameters:
- **range** String: Range name in the excel format (for example "A1:B2")

Output:
- Table EMF Object

Example:

```ecl
read-excel-file "workspace:/excel/devices.xlsx" "Supported devices"
    | get-table-range "A2:B4" | list [get rows] | each [val row] {
        $row | list [get values] | each [val value] {
            log $value
        }
}

```

### {{< eclCommand set-table-cells >}}
Sets cell values to the table

Input:
- **table** Table: Table to set cell values to

Parameters:
- **cells** EclMap: Map where key is cell name and value is cell value to set

Output:
- The value of 'table' argument

Example:

```ecl
read-excel-file "workspace:/excel/devices.xlsx" "Supported devices"
    | set-table-cells [map [entry "A1" "New Device Name"] [entry "B1" "New Device Target"]]
    | write-excel-file "workspace:/excel/devices.xlsx" -append

```
