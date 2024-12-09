#! /bin/bash
set -e
rm -r output_prod
docker run -ti --rm --mount "type=bind,source="`pwd`",destination=/data" clue/sculpin generate --env=prod

./deploy.sh
