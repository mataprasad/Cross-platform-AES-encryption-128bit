Original article--
http://blog.osom.info/2015/04/commons-codec-on-android.html

Note --
Since android internaly refrenced the apache common codes 1.3, so to include the newest version we rename the package name in the new version jar. The complete article link is given above.

command to run the jarjar--

java -jar jarjar-1.4.jar process commons-codec.rules commons-codec-1.10.jar commons-codec-1.10-rep.jar

If you want to skip the steps mentioned in the article, directly reference the 'commons-codec-1.10-rep.jar' jar to your android project