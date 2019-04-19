#! /bin/bash
rm -r output_prod
docker run -it --rm -v `pwd`:/data -u `id -u` clue/sculpin generate --env=prod
