#!/bin/sh


rm -rf docs/api;
rm -rf output;
rm -rf tmp;


vendor/phpdocumentor/phpdocumentor/bin/phpdoc -t tmp/phpdoc/  -d ./src --template=xml;
rm -rf tmp/phpdoc/phpdoc-cache-*;

mkdir -p docs/api
./vendor/evert/phpdoc-md/bin/phpdocmd  tmp/phpdoc/structure.xml docs/api;


rm -rf tmp
