#!/bin/bash
BASE_DIR=`dirname $0`
# change directory to where script lies, normally under tmpl_voltearte
cd $BASE_DIR
# save extension directory for sass command
EXT_DIR=`pwd`
echo $EXT_DIR
# change directory to htdocs parent directory. this is where .sass-cache-directory will be created
cd ../../../..

sass --watch $EXT_DIR/Resources/Private/Sass:$EXT_DIR/Resources/Public/Css