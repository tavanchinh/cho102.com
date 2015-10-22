<?php 
require_once('disqusapi/disqusapi.php');
$disqus = new DisqusAPI('n4fLXqUvqdHmnjD4SsuSNrEylBOA9Tlo5TpOYC8dezlCdhKSvrnQYtZn4E4IFPXh');
$disqus->trends->listThreads();
?>