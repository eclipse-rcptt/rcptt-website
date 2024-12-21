#!/bin/bash

# To host website on http://localhost:1313/rcptt/ , run:
# ./hugo.sh server --bind 0.0.0.0

ROOT=$(dirname $0)
docker run --rm -p1313:1313 -ti --mount type=bind,source=${ROOT},destination=/mnt --env HUGO_MINIFY_TDEWOLFF_HTML_KEEPCOMMENTS=true --env HUGO_ENABLEMISSINGTRANSLATIONPLACEHOLDERS=true --workdir /mnt eclipsecbi/hugo_extended:0.110.0 hugo "$@"