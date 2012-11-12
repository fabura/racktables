<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $title ?> - Tag History</title>

    <link rel='ICON' type='image/x-icon' href='?module=chrome&uri=pix/favicon.ico' />
    <link rel=stylesheet type='text/css' href='?module=chrome&uri=css/pi.css' />
    <script type='text/javascript' src='?module=chrome&uri=js/jquery-1.4.4.min.js'></script>
    <script type='text/javascript' src='?module=chrome&uri=js/racktables.js'></script>
    <script type='text/javascript' src='?module=chrome&uri=js/tag-cb.js'></script>
    <script type="text/javascript">
        tag_cb.enableNegation()
    </script>
    <script type="text/javascript">
        tag_cb.enableSubmitOnClick()
    </script>

</head>
<body>


<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%" class="maintable">
    <tr class="mainheader"><td>
        MyCompanyName RackTables <a href="http://racktables.org" title="Visit RackTables site">0.20.1</a><ul class="qlinks"><li><a href="index.php?page=depot">Objects</a></li><li><a href="index.php?page=ipv4space">IPv4&nbsp;space</a></li><li><a href="index.php?page=rackspace">Rackspace</a></li></ul> <div style="float: right" class=greeting><a href='index.php?page=myaccount&tab=default'>Trololo</a> [ <a href='?logout'>logout</a> ]</div>
    </td></tr>
    <tr><td class="menubar">
        <table border="0" width="100%" cellpadding="3" cellspacing="0">
            <tr><td class=activemenuitem width='99%'><a href='index.php?page=index&tab=default'>Main page</a> : <a href='index.php?page=reports&tab=default'>Reports</a></td><td><table border=0 cellpadding=0 cellspacing=0><tr><td>Search:</td><form name=search method=get><td><input type=hidden name=page value=search><input type=text name=q size=20 tabindex=1000></td></form></tr></table></td></tr>
        </table>
    </td></tr>
    <tr><td>
        <?php   showTabs($pageno, $tabno); ?>
    </td></tr>
    <tr><td></td></tr>
