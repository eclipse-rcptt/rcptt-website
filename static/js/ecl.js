Prism.languages.ecl = {
    'comment': [
	{
	    pattern: /(^|[^\\])\/\*[\w\W]*?\*\//g,
	    lookbehind: true
	},
	{
	    pattern: /(^|[^\\:])\/\/.*?$/mg,
	    lookbehind: true
	}
    ],
    'command': [
		{
			pattern: /((\u200b|\n|\||\[|\{)\s*)\$?[a-zA-Z][a-zA-Z\-0-9]*/,
			lookbehind:true
		},
		{
			pattern: /^\s*[a-zA-Z][a-zA-Z\-0-9]*/,
			lookbehind:false
		}
    ],
    'string': /("|')(\\?.)*?\1/g,
    'operator': /\||\[|\]|\+|\{|\}/,
    'attr': /-[a-zA-Z]+/
}
