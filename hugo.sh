#!/bin/bash

docker run --rm -p1313:1313 -ti --mount type=bind,source=/Users/vasiligulevich/git/rcptt,destination=/mnt --env HUGO_MINIFY_TDEWOLFF_HTML_KEEPCOMMENTS=true --env HUGO_ENABLEMISSINGTRANSLATIONPLACEHOLDERS=true --workdir /mnt eclipsecbi/hugo_extended:0.110.0 hugo "$@"