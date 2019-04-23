#! /bin/bash
set -e
git checkout master
cp -r output_prod/* .

read -n 1 -p "Do you want to commit and push? [y/n] " answer
case ${answer} in
    y|Y )
      git commit -a -s
      git push gerrit HEAD:refs/for/master
      echo Success
    ;;
    * )
      echo Success
    ;;
esac
