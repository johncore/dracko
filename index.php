<!-- REV: 04-21-2016 -->
<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/libs/drackoManage.php"); $dracko=new drackoManage();
if(isset($_GET['do']) && $_GET['do']=="logoff"){ $dracko->user->logoff(); }

$dracko->LoadConfig();

$my_hostname=$GLOBALS['my_hostname'];
$captcha_version=$GLOBALS['captcha_version'];
$my_email=$GLOBALS['my_email'];

global $my_hostname;
global $captcha_version;
global $my_email;

?>
<!--dracko version 05-08-07-->

<?php $dracko->dsp_revision_history(); ?>

<?php
define("DRACKO_GREEN", "AFDD6E");
define("DRACKO_LTGREEN", "C5DBA4");
define("DRACKO_PURPLE1", "AD5697");
define("DRACKO_PURPLE2", "AD82A2");
define("DRACKO_PURPLE3", "AD97A7");
define("DRACKO_BLUE", "564182");
define("DRACKO_SLIME", "99ff33");
define("DRACKO_WHITE", "ffffff");
define("DRACKO_GREY", "C0C0C0");
?>
<html>
<head>
<title>dracko - IT Solutions</title>
<link rel="StyleSheet" href="inc/css/site_style.css" TYPE="text/css"/>
<link rel="StyleSheet" href="inc/css/picpop.css" TYPE="text/css"/>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="animated_favicon1.gif" type="image/gif" >
<link rel="search" href="http://www.dracko.org/opensearchdescription.xml" type="application/opensearchdescription+xml" title="dracko.org" />
<meta name="msvalidate.01" content="0030D327C6DAF92721EF4D76901D9ADB" />
<META Name="description" Content="this solution search engine is perfect for answering your solaris and linux questions">
<META Name="keywords" Content="solaris, linux, redhat, redhat, sun, sparc, scripts, solutions, networking, zone, zfs, veritas, svm">
</head>

<?php $dracko->dsp_script("begin"); ?>
<?php $dracko->dsp_script("hints"); ?>

<!--JOHN----------------------------------------------------->
<body BGCOLOR="#C0C0C0">
<table cellpadding="0" cellspacing="0" border="1" id="search">
<tr>
<td style="width:1000px">
<?php
$url = $_SERVER['REQUEST_URI'];

if(strcmp($url,'/index.php') == 0 || strcmp($url,'/') == 0 && $GLOBALS['static_home_header']){
	//echo "<img align=\"center\" src=\"img/header/tunnel.jpg\" align=\"left\" height=\"280\" width=\"1000\">";
	echo '<figure1>';
	echo "<img align=\"center\" src=\"img/header/tunnel.jpg\" align=\"left\" style=\"width:1000px;height:280px;\" >";
	echo '<figcaption1>';
	echo '<h3>me, on the Appalachian Trail</h3>';
	echo '</figcaption1>';
	echo '</figure1>';
}else{
	$imagesDir = 'img/header/';
	$imagesJC = glob($imagesDir . '*.{jpg,jpeg,png,gif,bmp,JPG}', GLOB_BRACE);
	//srand();//shuffle($imagesJC);
	//$imagesJC=$dracko->randomize_array_1($imagesJC);
	//$randomImage = $imagesJC[array_rand($imagesJC)];
	//$randomImage = $imagesJC[$dracko->nextNumFromFile("headers",count($imagesJC))];
	$randomImage = $dracko->returnRandomImage("headers",$imagesJC);
	$search = explode('/', $randomImage)[2];
	$caption=$dracko->get_caption($search,"img/header/caption.txt");
	echo '<figure1>';  // css tag
	echo '<img src="'.$randomImage.'" align="center" style="width:1000px;height:280px;" >';
	//echo '<img src="'.$randomImage.'" align="center" height="280" width="1000" >';
	//echo '<img align="center" src="'.$randomImage.'" align="left" height="280" width="1000" >';
	echo '<figcaption1>';
	echo '<h3>'.$caption.'</h3>';
	echo '</figcaption1>';
	echo '</figure1>';
}
?>
</TD>
<TD>
<div id="jcpop">
<a href="<?=$_SERVER['PHP_SELF']?>">
<u>Rants of John Core</u>
<span>
<?php $dracko->dsp_aboutjc(); ?>
</span>
</a>
</div>
<br>
<?php echo $dracko->dracko_fortune(); ?>
</TD>
</TR>
</TABLE>
<!--TOP OF PAGE---------------------------------------------->
<body BGCOLOR="#C0C0C0">
<table>
<TR>
<!===td width = 800 for google 234x60 image>
<!===td width = 500 for google 468x60 image>
<!==ad_type can be text_image, image, text>
<TD width=400 >
<h1 style="margin:0px;padding:0px">
<div id="helppop">
<a href="index.php"><FONT SIZE=4>Tidbits from John Core and friends</FONT>
<span>
<?php $dracko->dsp_help(); ?>
</span>
</a>
</div>
<FONT SIZE=1><BR><BR> IT dragons tamed since 2006 <?php echo "(with ".$dracko->ShowSolutionTotals()." solutions and growing)"; ?></FONT></h1>
</td>
<td width=100>
</td>
<td>
<FONT SIZE=3>
<center>
<?php
if(!$dracko->user->isLoggedIn()){
	echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=login\">login</a>]<br/>";
	echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_login\">join</a>]<br/><br/>";
}else{
	echo "[<a href=\"".$_SERVER['PHP_SELF']."?do=logoff\">logoff</a>]";
}
?>
</center>
</font>
</td>
<td width = 50 ></TD>
<td align="right" ><!br>
<?php $dracko->dsp_google_add("468x60_as"); ?>
</td>
</tr>
</table>
<!--FORTUNE-------------------->

<?php
//require("fortune/dracko_fortune.php");
//echo($theQuote);
?>

<br/><br/>

<!--PROXY-------------------->
<?php
//require("proxy/PHProxy.class.php");
?>

<!--Dracko Search------------>
<table cellpadding="0" cellspacing="0" border="1" id="search">
<tr>
<td>
<form action="<?=$_SERVER['PHP_SELF']?>?search=1" method="POST">
<a href="http://www.dracko.org/">
<!img src="http://www.dracko.net/img/dracko_logo2.png" border="0" align="left"></a>
<input type="text" name="search_term" size="40">
<input style="background-color: #99ff33; color: #000000; font-weight: bold; font-size: 10pt;" type="submit" name="submit" value="Search Dracko">
</form>
</td>
<td>
<form action="<?=$_SERVER['PHP_SELF']?>?search=4" method="POST">
<input type="text" name="search_term" size="5">
<input style="background-color: #99ff33; color: #000000; font-weight: bold; font-size: 10pt;" type="submit" name="submit" value="get #">
</form>
</td>
<!--google search------------>
<td>
<form method="get" action="http://www.google.com/custom" target="google_window">
<a href="http://www.google.com/">
<img src="http://www.google.com/logos/Logo_25wht.gif" border="0" alt="Google" align="left"></img></a>
<input type="text" name="q" size="40" maxlength="255" value=""></input>
<input type="submit" name="sa" value="Search"></input>
<input type="hidden" name="client" value="pub-3501416397211898"></input>
<input type="hidden" name="forid" value="1"></input>
<input type="hidden" name="ie" value="ISO-8859-1"></input>
<input type="hidden" name="oe" value="ISO-8859-1"></input>
<input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1"></input>
<input type="hidden" name="hl" value="en"></input>
</form>
</td>
<!--google end--------------->
</TR>
</table>
<!--Search end--------------->

<!--MAIN TABLE---------------------------------------------------->
<table cellpadding="0" cellspacing="0" border="0" id="main">
<tr>
	<!--MENU LEFT-------------------->
	<td id="menu">
		<?php $dracko->picofme3("about"); ?>

		<hr width=96% size=4 color="#000000">
		<h3 style="margin-bottom:2px"><center>Menu</center></h3>
		[<a href="<?=$_SERVER['PHP_SELF']?>">home</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=form&n=make_post">post a solution</a>]<br/>

		<br>
		<?php
		if(!$dracko->user->isLoggedIn()){
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=login\">login</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_login\">new user</a>]<br/><br/>";
		}
		?>
		[<a href="<?=$_SERVER['PHP_SELF']?>?story=top">top solutions</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?story=recent">newest solutions</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?story=views">most viewed</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?story=score">high scores</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=top_voters">top voters</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=latest_votes">latest votes</a>]<br/>
		<BR>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=about">about</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=form&n=contact">contact us</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=community">community</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=slashdot">slashdot news</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=lin-sol-rosetta">linux-solaris-translate</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=johncore">me</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=other">Other sites by me</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=other-sites">Other unix sites</a>]<br/>
		[<a href="<?=$_SERVER['PHP_SELF']?>?s=page&n=show_ip">Show my IP</a>]<br/>
		<br>
		<!-----Registered User Area----------------------------------------->
		<hr width=96% size=4 color="#000000">
		<h3 style="margin-bottom:2px"><center>Registered User Area</center></h3>
		<?php
		if($dracko->user->isLoggedIn()){
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?do=logoff\">logoff</a>] ".$dracko->user->getUsername()."<br/>";
		}else{
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=login\">login</a>]<br/>";
		}
		if($dracko->user->isLoggedIn()){ 
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_post\">post a solution</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?n=cast_votes\">cast your votes</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=profile\">my profile</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=quick-reference\">quick reference cards</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=download\">downloads</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=transfer\">file transfer</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=gallery\">photo gallery</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=list-fortunes\">all fortunes</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_videos\">videos</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_default_passwords\">default pw db</a>]<br/>";
			//echo "[<a href=\"/proxy/\">anon surf (proxy)</a>]<br/>";
		}else{
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_login\">cast your votes</a>]<br/>";
			//echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_login\">anon surf (proxy)</a>]<br/>";
		}
 		?>

		<?php
		if($dracko->user->isLoggedIn() && $dracko->user->isAdmin()){ 
			echo '<hr width=96% size=4 color="#000000">';
			echo '<h3 style="margin-bottom:2px"><center>Admin Area</center></h3>';
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=admin\">admin</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_config\">Show config</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=edit_config\">Edit config</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_system_files\">Edit system files</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_backup_files\">Restore backup files</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_revision\">Show Revisions</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_revision_history\">Revision History</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_backup2\">sql backup</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=user_goodies\">show users</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=update_scores\">update scores</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=banned_ips\">banned ips</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=ban_ip_block\">ban a block</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=visits\">visits</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=visits_geo\">visits + geo</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=picofme\">all my pics</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=edit_pic_captions\">edit pic captions</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_headers\">headers (small)</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=display_headers\">headers (large)</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=edit_header_captions\">edit header captions</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_test_page\">test new code</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=page&n=show_fortunes\">all fortunes</a>]<br/>";
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=add_default_password\">add to dp db</a>]<br/>";
		}
 		?>
		<br>
		<?php
		if(!$dracko->user->isLoggedIn()){
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?s=form&n=make_login\">register</a>]<br/>";
		}
		?>
		<hr width=96% size=4 color="#000000">
		<!-----End User Area----------------------------------------->

		<!-----Categories----------------------------------------->

		<h3 style="margin-bottom:2px"><center>Categories</center></h3>
		<?php
		$cats=$dracko->getCategoryData(); //echo "<pre>"; print_r($cats); echo "</pre>";
		$cast_votes=(strstr($_SERVER['REQUEST_URI'],"n=cast_votes")) ? true : false; //jc
		$sec_url=($cast_votes) ? $_SERVER['PHP_SELF']."?n=cast_votes&cat_id" : $_SERVER['PHP_SELF']."?cat_id";
		$total_solutions=0;
		echo	"<div class=\"buttonscontainer\">";
		echo	"<div class=\"buttons\">";
		foreach($cats as $key => $value){
			//$t=sprintf("[%2d]  %s",$value['post_count'],$value['cat_title']);
			$t=sprintf("%s  [%2d]",$value['cat_title'],$value['post_count']);
			//$t=sprintf("<p>%s  [%2d]</p>",$value['cat_title'],$value['post_count']);
			echo "<a href=\"".$sec_url."=".$value['ID']."\">".$t."</a>";
			$total_solutions+=$value['post_count'];
		}
		echo	"</div>";
		echo	"</div>";
		echo "<BR>Total Solutions: ".$total_solutions;
		$dracko->ShowTotals();
		echo "<br><br> Ver: ".trim($GLOBALS['version']);

		?>
		<BR>

		<?php
		if($dracko->user->isLoggedIn()){ 
			echo "<hr width=96% size=4 color=\"#000000\">";
			echo "<br/>";
			echo "logged in as <b>".$dracko->user->getUsername()."</b><br/>"; 
			echo "[<a href=\"".$_SERVER['PHP_SELF']."?do=logoff\">logoff</a>]";
		}
		?>
		<BR><BR>
		<!-------Advanced Search--------------->
		<?php //$dracko->dsp_search_form(); ?>
		<!-------End Advanced Search--------------->

		<hr width=96% size=4 color="#000000">
		<!-->Main RSS: <a href="feed.php?promoted=1"><img src="img/xml.gif" border=\"0\"></a>
		<br>
		<hr width=96% size=4 color="#000000">
		<?php
		$file=$_SERVER['DOCUMENT_ROOT']."/count.txt";
		$fp=fopen($file,"r");
		$content=fgets($fp);
		fclose($fp);
		$cont=$content+1;
		$fp=fopen($file,"w+");
		fwrite($fp, $cont);
		fclose($fp);
		//echo "<p>Count: ".$cont."<br/>";
		//echo	"<BR>";
		//echo	"<img src=\"img/psst.gif\" border=\"0\">";
		echo "<p>Count: ".number_format($dracko->updatePageCount())."<br/>";

		?>
		<hr width=96% size=4 color="#000000">

		<?php
		if($dracko->user->isLoggedIn()){ 
			//echo "[<a href=\"/proxy/\">proxy</a>]<br/>";
		}
		$dracko->ShowOnline();
		$dracko->Visitor_Track();
 		?>
	</td>
<!--END OF MENU SECTION--------------------------------------------------->
<!--MAIN WINDOW----------------------------------------------------------->

	<td id="contents">
		<?php
		//echo "<pre>"; print_r($_SERVER); echo "</pre>";
		if($_SERVER['REQUEST_URI']=="index.php" || $_SERVER['REQUEST_URI']=="/"){
		?>
		<div id="message">
		<p>
		Welcome to dracko.org - Sun Solutions and more.<BR>    
		Not a member yet? click <A href="http:index.php?s=form&n=make_login">here</A>!
		Members get to vote, get credit for solutions posted, and have access to our
		download section, quick reference cards, and more. It's easy, painless and free. Really. 
		And we won't give your info away to anyone.
		<p>
		</div>
		<?php } ?>
		<br/>
		<?php
		//---set story order ----this is default display
		if(isset($GLOBALS['storyorder'])){
			$storyorder=$GLOBALS['storyorder'];
		}else{
			$storyorder="top";
		}
		//$storyorder="recent";
		if(isset($_GET['story']))$storyorder=$_GET['story'];
		//---done set story order

		$sections=array("form","page");
		if(isset($_GET['s']) && in_array($_GET['s'],$sections)){
			//echo "section: ".$_GET['s']."<br/>";
			switch(strtolower($_GET['s'])){
				case "form": 
					//catch for the forms....
					$admin_only=array("del_post","edit_post");
					
					include_once($_SERVER['DOCUMENT_ROOT']."/libs/formManage.php");
					$file=$_SERVER['DOCUMENT_ROOT']."/inc/forms/".$_GET['n'].".php";
					$con_name=$_GET['n'];
		 			if(is_file($file)){
						include_once($file); $form=new $con_name($dracko); //print_r($form);
						if(in_array($_GET['n'],$admin_only)){
							if($dracko->user->isLoggedIn() && $dracko->user->isAdmin()){ 
								$form->run();
							}else{ echo "You are not allowed to access this resource...<br/>\n"; }
						}else{ $form->run(); } 
					}else{ echo "You have reached an invalid resource....please return to <a href=\"index.php\">the main page</a><br/>\n"; }
					break;
				case "page": 
					include_once($_SERVER['DOCUMENT_ROOT']."/inc/pages/".$_GET['n'].".php");
					break;
				default: echo "You have reached an invalid resource!<br/>";
			}
		}else{
			//--- Display user information....
			if(isset($_GET['user'])){
				$user_info=$dracko->user->getUserInfo($_GET['user']); //print_r($user_info);
				if($user_info['photo'] != "" ){
					echo	"<img align=\"right\" src=\"".$user_info['photo']."\">";
				}
				echo	"<Font size=4>";
				echo "<b>User:</b> ".$user_info['username']."<br/>";
				echo "<b>Location:</b> ".$user_info['location']."<br/>";
				if($user_info['homepage'] != "" ){
					echo "<b><A href=\"".$user_info['homepage']."\">homepage</A></b><br/><br/>";
				}
				echo	"</font>";

				$returned=$dracko->getUserPosts($_GET['user']);
				//echo "<pre>"; print_r($returned); echo "</pre>";
				
				echo "<b>Posts made (".count($returned)."):</b><br/>";
				echo "<div style=\"padding:5 0 0 15\">";
				foreach($returned as $key => $value){
					if($value['vote_count']<$dracko->promote_level){
						$link="index.php?n=cast_votes&post_id=".$value['ID'];
					}else{ $link="index.php?post_id=".$value['ID']; }
					echo "<a style=\"font-size:12px\" href=\"".$link."\">".$value['title']."</a><br/>\n";
					echo date("m.d.Y H:i:s",$value['date_posted'])." | votes: ".$value['vote_count']."<br/>";
					echo "<br/>";
				}
				echo "</div>";

				$returned=$dracko->getUserComments($_GET['user']);
				//echo "<pre>"; print_r($returned); echo "</pre>";
				
				echo "<b>Comments made on (".count($returned)."):</b><br/>";
				echo "<div style=\"padding:5 0 0 15\">";
				if(!empty($returned)){
					foreach($returned as $key => $value){
						echo "<a style=\"font-size:12px\" href=\"\">".$value['title']."</a><br/>";
						echo date("m.d.Y H:i:s",$value['date_posted'])."<br/>";
						echo "<br/>";
					}
				}
				echo "</div>";
				//jcbreak;
			}
			
			$cast_votes=(strstr($_SERVER['REQUEST_URI'],"n=cast_votes")) ? true : false;
			//jc echo "<a href=\"".$dracko->buildFeedURL()."\"><img src=\"img/xml.gif\" border=\"0\"></a><br/><br/>";

			$id=	(isset($_GET['post_id']))	? $_GET['post_id']	: '';
			$page=	(isset($_GET['page']))		? $_GET['page']		: '1';
			$cat=	(isset($_GET['cat_id']))	? $_GET['cat_id']	: '';
			$pro=	($cast_votes)				? '0' : '1';

			if(isset($_GET['search']) && ($_GET['search']=="1" || $_GET['search']=="2" || $_GET['search']=="3" || $_GET['search']=="4")){
				$posts=$dracko->searchPosts($_POST['search_term'],$_GET['search']);
			}else{
				$posts_count=count($dracko->getStoryData($id,"0",$pro,$cat));
		
				if($storyorder == "top"){
					$posts=$dracko->gettopstory($id,$page,$pro,$cat);
				}elseif($storyorder == "views"){
					$posts=$dracko->gettopviews($id,$page,$pro,$cat);
				}elseif($storyorder == "score"){
					$posts=$dracko->gettopscores($id,$page,$pro,$cat);
				}else{
					$posts=$dracko->getStoryData($id,$page,$pro,$cat);
				}
			}
			// This is the start of displaying posts
			if(empty($posts)){ 
				echo "Sorry no solutions found!<br/>";
				//echo "No promoted posts found!<br/>"; 
				//echo "Looked in <a href=\"".$_SERVER['PHP_SELF']."?&n=cast_votes\">the Voting section</a> yet?";
				//break; 
			}else{
			//echo	"posts=".$posts."key=".$key."value=".$value;
			$dracko->ChangeView($storyorder);
			foreach($posts as $key => $value){

				//<!--did they already vote on item? if so, show 'X' graphic-->

				if($dracko->user->isLoggedIn()){
					//if($dracko->checkVotesUser($ID,$_GET['user_id'])){
					//syntax post_id,user_id
					//echo "DIAG:".$ID."-".$dracko->user->getUserID();
					//echo "DIAG:".$value['ID']."-".$dracko->user->getUserID();
					if($dracko->checkVotesUser($value['ID'],$dracko->user->getUserID())){
						$vb_class="vote_block_fade";
						$vb_img="up-arrow_fade.gif";
					}else{
						$vb_class="vote_block";
						$vb_img="up-arrow.gif";
					}
				}else{
					$vb_class="vote_block";
					$vb_img="up-arrow.gif";
				}


				if($cast_votes || $value['vote_count']<$dracko->promote_level){
					//$vb_class="vote_block_fade";
					//$vb_img="up-arrow_fade.gif";
					$comment_link=$_SERVER['PHP_SELF']."?n=cast_votes&post_id=".$value['ID'];
					$section_link=$_SERVER['PHP_SELF']."?n=cast_votes&cat_id=".$value['cat_id'];
				}else{
					//$vb_class="vote_block";
					//$vb_img="up-arrow.gif";
					$comment_link=$_SERVER['PHP_SELF']."?post_id=".$value['ID'];
					$section_link=$_SERVER['PHP_SELF']."?cat_id=".$value['cat_id'];
				}
				
				if($dracko->user->isLoggedIn()){ 
					$link="<a href=\"#\" onClick=\"updateDiv('vote_count_".$value['ID']."','".$dracko->user->getUserID()."')\">";
				}else{
					$link="<a href=\"index.php?s=form&n=login\">";
				}

				if($dracko->user->isLoggedIn() && $dracko->user->isAdmin()){ 
					$admin_links="[<a class=\"admin_link\" href=\"".$_SERVER['PHP_SELF']."?s=form&n=del_post&id=".$value['ID']."\">delete</a>] ";
					$admin_links.="[<a class=\"admin_link\" href=\"".$_SERVER['PHP_SELF']."?s=form&n=edit_post&id=".$value['ID']."\">edit</a>] ";
					if($value['ip_origin'] != "" ){
						$admin_links.="[<a class=\"admin_link\" href=\"".$_SERVER['PHP_SELF']."?s=form&n=ban_ip&ip=".$value['ip_origin']."\">ban ip ".$value['ip_origin']."</a>]<br/>";
					}else{
						$admin_links.="<br/>";
					}

				}else{ $admin_links=""; }
// green box
				$dracko->updatePostScore($value['ID'],$value['vote_count'],$value['views']);
				/////////////////////////////////////////
				// for no comments use this: <td width="120"><!--a href="%s"--><!--%s comments--><!--/a--></td>
				// for comments use this: <td width="120"><a href="%s">%s comments</a></td>
				////////////////////////////////////////

				echo sprintf('
					<table cellpadding="0" cellpaddding="0" border="0" id="post_table">
					<tr>
						<td class="%s" rowspan="4">
							<span style="font-size:14px;font-weight:bold"><div style="padding:0px;margin:0px" id="vote_count_%s">%s</div></span>score<br/>
							%s
							<img src="img/%s" border="0"/>
							<br/>
							<span style="font-size:9px">[vote]</span>
							</a>
						</td>
						<td class="title"><a class="title_link" href="index.php?s=page&n=show_post&id=%s">%s</a></td>
					</tr>
					<tr><td class="submitted">%ssubmitted by <a href="index.php?user=%s">%s</a> at %s (%d votes - %d views - score %d)</td></tr>
					<tr><td class="content">%s</td></tr>
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" border="0" id="post_table_sub">
							<tr>
			
								<td width="120"><a href="%s">%s comments</a></td>
								<td width="120" style="text-align:left;padding-left:40px">category: <a href="%s">%s</a></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
					<br/>
				',$vb_class,$value['ID'],$value['score'],$link,$vb_img,$value['ID'],
				stripslashes($value['title']),$admin_links,$value['submitted_user_id'],
				$value['username'],date("m.d.Y H:i:s",$value['date_posted']),$value['vote_count'],$value['views'],$value['score'],
				$value['content'],$comment_link,$value['comment_count'],
				$section_link,$value['cat_title']);
			}
			} // end of test for empty $post
											//<td width="120"><a href="">blog</a></td> was under printf statement under comments
			if(isset($_GET['post_id'])){
				echo "Comments:<br/>";
				$comments=$dracko->getComments($_GET['post_id']);
				//echo "<pre>"; print_r($comments); echo "</pre>";
		
	       			if(empty($comments)){ 
					echo "No comments found!<br/>"; 
					echo "Looked in <a href=\"".$_SERVER['PHP_SELF']."?&n=cast_votes\">the Voting section</a> yet?";
				}else{

				foreach($comments as $key => $value){
					// for some stupid reason, when I created the comment DB table, I only
					// stored the user ID, not the user name, so the next buggery is to
					// extract that out into $comment_user_info
					$comment_user_info=$dracko->user->getUserInfo($value['user_id']);
					echo sprintf('
						<table cellpadding="0" cellspacing="0" border="0" id="comment_table">
						<tr><td class="title">%s</td></tr>
						<tr><td class="content">%s</td></tr>
						<tr><td class="date">posted: %s</td></tr>
						<tr><td class="date">user: %s name: %s</td></tr>
						</table>
						<br/>
					',$value['title'],nl2br($value['content']),date("m.d.Y H:i:s",$value['date_posted']),$value['user_id'],$comment_user_info['username']);
				}
				}//empty comments
				include_once($_SERVER['DOCUMENT_ROOT']."/libs/formManage.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/inc/forms/make_comment.php");
				$form=new make_comment();
				$form->run();

				$results=$dracko->getPostVoters($_GET['post_id']);
				echo "<div class=\"users_voted\">";
				echo "<h3 style=\"margin:0px\">Users who voted on this post:</h3>";

	       			if(!empty($results)){ 
					foreach($results as $key => $value){
						echo "<a href=\"".$value['ID']."\">".$value['username']."</a><br/>";
					}
				}
				echo "</div>";
			}
		}

		echo "<hr/>";

		//-------------display other posts squares--------------------//
		
		if(!isset($_GET['s']) && !isset($_GET['p'])){
			$dracko->ChangeView($storyorder);
			// create the pagination
			//echo "records_to_page=".$dracko->records_to_page;
			//echo "post_count=".$posts_count;
			if(empty($posts_count))$posts_count=1;
			$pages=ceil($posts_count/$dracko->records_to_page);
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
			echo "<tr><td>pages:</td>";
			for($i=1;$i<=$pages;$i++){
				if($i < 90){
					if($i % 16 == 0)echo "</tr><tr><td></td>";
				}else{
					if($i % 12 == 0)echo "</tr><tr><td></td>";
				}
				if($cast_votes){
					$link=$_SERVER['PHP_SELF']."?n=cast_votes&page=".$i;
				}else{
					if(!isset($_GET['cat_id'])){   		// if catalog is not set
						if(!isset($_GET['story'])){ 	// if story is not set
							$link=$_SERVER['PHP_SELF']."?page=".$i;
						}else{
							$link=$_SERVER['PHP_SELF']."?page=".$i."&story=".$_GET['story'];
						}
					}else{ 
						$link=$_SERVER['PHP_SELF']."?page=".$i."&cat_id=".$_GET['cat_id'];
					}
				}
				if(isset($_GET['page'])){ 
					if($i==$_GET['page']){ 
						$class="page_link_block_sel"; 
					}else{ $class="page_link_block"; }
				}else{ if($i=="1"){ $class="page_link_block_sel"; }else{ $class="page_link_block"; } }
				echo "<td><a class=\"page_link\" href=\"".$link."\"><div class=\"".$class."\">".$i."</div></a><td/>";
			}
			echo "</tr>";
			echo "</table>";
		}
		?>
	</td>
<!--RIGHT MENU---------------------------------------------------------->
	<!-----Paying the rent----------------------------------------->
	<td id="money" align="right" style="font-size:10px">	
	<?php $dracko->picofme1("news"); ?>
	<hr width=96% size=4 color="#000000">

	<h3 style="margin-bottom:2px"><center>Paying the Rent</center></h3>
	<BR>
	<CENTER>
	<!-------google adsense ------------------->
	<?php $dracko->dsp_google_add("120x600_as"); ?>
	<!-------END google adsense ------------------->
	<!-------google referral ------------------->
	<?php $dracko->dsp_google_add("120x60_as_rimg"); ?>
	<!-------google pack ------------------->
	<?php $dracko->dsp_google_add("pack"); ?>
	<!-------end paying the rent--------------->
	<!-------Advanced Search--------------->
	<?php $dracko->dsp_search_form2(); ?>
	<!-------End Advanced Search--------------->

	</CENTER>
	<!------digg---->
	<hr width=96% size=4 color="#000000">
	<?php $dracko->SpreadTheWord(); ?>
	<!------end-digg---->
	
	</td>


<!--RIGHT MENU END------------------------------------------------------>

</tr>

<tr><td></td><td align="center" style="font-size:15px">Don't forget to vote!</td></tr><br>
<tr>
	<td></td><td align="center" style="font-size:10px">
	<?php
		echo "<a href=\"mailto:".$dracko->antispambot("core.john@gmail.com")."\">Powered by John Core</a>";
	?>
	<BR>
	<!A HREF="http://www.johncore.net">Bye!</A>
	</td>
</tr>

</table>
<br>
<center>
<!--Begin Bottom Big Google add------------------------------------------------------>
<?php $dracko->dsp_google_add("bottom"); ?>
<!--End Bottom Big Google adds------------------------------------------------------>
</center>
<!--Begin Google analyitics------------------------------------------------------>
<?php $dracko->dsp_google_add("analytics"); ?>
<!--End Google analyitics-------------------------------------------------->

<!-- Amobee Content Ads;-->
<!-- end Amobee Content Ads -->
<!-- infolinks Content Ads -->
<script type="text/javascript"> var infolinks_pid = 2625448; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script> 
<!-- end infolinks Content Ads -->
</body>
</html>
