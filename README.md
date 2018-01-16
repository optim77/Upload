<h1>Upload library</h1>
<h5>Upload is a library to php thanks to whiich 
you will be able to upload files more easly</h5>

<h2>Simlpe use:</h2>
<blockquote>
require 'src/Main.php';<br>
$Main = new Main($_FILES);<br>
$Main->oneHandUpload()</blockquote>

<h2>You can:</h2>
<ol>
<li>Determine the file size</li>
<li>Dermine the file size depending on the file format</li>
<li>Determine able or unable file formats</li>
<li>Determine type of name file</li>
<li>Determine the path to save file</li>
</ol>

<h2>Introduction:</h2>
<h3>Validate extend of file:</h3>
If you want change extend of file you can do this on two way.<br>
First you have to choose how to return the value.<br>
They are two ways.<br>First is a return exact type of file and second is a return approximate type of file (if you insert jpeg or png function return 'image')<br>
First way is a insert true on first value in function <code>$Main->oneHandUpload(true);</code> or <code>$Main->Extend(true);</code><br>
Second option is a fill second argument in function <code>$Main->oneHandUpload(false,true);</code> or <code>$Main->Extend(false,true);</code>
Also if you want to forbidden some extends you can insert array of this values in function <code>$Main->oneHandUpload(false,true,array('image/jpeg','audio/mpeg'));</code> or <code>$Main->Extend(false,true,array('image/jpeg','audio/mpeg'));</code>
<br>
<br>
<h3>Size of file:</h3>
To determine the size range of the file you should:<br>
A.If you want set the same size of the whole format you have
to insert true as the fourth argument and insert minimal and maximal in 
next two <code>$Main->oneHandUpload(true,false,null,true,0,800000);</code> or <code>$Main->Size(true,false,0,800000)</code><br>
B.If you want set different sizes to files you have to insert true as 
fifth argument and add array with extend and sizes as the 
eight argument <code>$Main->oneHandUpload(true,false,null,false,true,null,null,array('image/jgep' => ['minSize','maxSize'],'video/mp4' => ['minSize','maxSize']));</code> or <code>$Main->Size(true,false,null,null,array('image/jgep' => ['minSize','maxSize'],'video/mp4' => ['minSize','maxSize']))</code><br>
<br>
<br>
<h3>Name of file:</h3>
There are two ways to save the file name:<br>
A.Generate new name file using <code>sha1(uniqid(null,true))</code>.When you want use it you have to insert true as the ninth arguments <code>$Main->oneHandUpload(true,false,null,true,0,800000,null,true);</code> or <code>$Main->Name(true,false);</code><br>
B.Use the same name of file without danger chars.To use this you have to insert true as tenth arguments in function and insert length of mane as eleventh argument <code>$Main->oneHandUpload(true,false,null,true,0,800000,null,false,true,50);</code> or <code>$Main->Name(false,true,50);</code>
<br>
<br>
<h3>Location of file:</h3>
The twelfth argument is used to determine the location.
The location begins with the Path file in the src folder.
It uses the __DIR__ variable.
Initially, all files are saved in the src / upload folder.
If you want change in you have to insert the location as the last argument of function <code>$Main->oneHandUpload(true,false,null,true,0,800000,null,true,false,null,'../../upload/');</code> or <code>$name = $Main->Name(true,false); $Main->Move('../../upload',$name);</code><br><br>


All supported formats are located in the src / Extend file. If you want to change them or add new ones, go ahead.