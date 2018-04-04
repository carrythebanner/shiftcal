<?php

include(getcwd() . '/../app/init.php');
include(getcwd() . '/../app/iCalExporter.php');

if (isset($_GET['id'])) {
	$event_id = $_GET['id'];
	$event = new Event($event_id);
	$title = $event->getTitle();
	$exporter = new iCalExporter( $event );
	$output = $exporter->export();
	header( "Content-type: text/calendar; charset=utf-8" );
	header( "Content-Disposition: inline; filename={$title}.ics" );
	echo $output;
}
