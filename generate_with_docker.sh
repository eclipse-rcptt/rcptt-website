#! /bin/bash
set -e
rm -f -r output_prod
docker run -it --rm -v `pwd`:/data -u `id -u` clue/sculpin generate --env=prod

./deploy.sh
