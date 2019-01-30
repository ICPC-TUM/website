#!/bin/bash
# FILES="$@"
shopt -s globstar
shopt -s nullglob

for i in images/**/*.{jpeg,jpg,png}
do
	echo -n "Processing image $i ..."

	THUMB=$(dirname $i)/thumb.$(basename $i)
	YAML=$(dirname $i)/$(basename $i).meta.yml

	if [ -f $THUMB ]; then
		echo " ignored - Thumbnail exists."
	elif [[ $(basename $i) =~ ^thumb\..* ]]; then
		echo " ignored - is a thumbnail."
	else
		convert -thumbnail 200 $i $THUMB
		echo "thumb: $(basename $THUMB)" > $YAML
		echo " successful."
	fi
done
