<?php

$events = array_reverse(json_decode(file_get_contents("https://api.meetup.com/GDGRzeszow/events?&sign=true&photo-host=public&page=20&key=786d2a84355b393715e1c5f4174a")));
$past = array_reverse(json_decode(file_get_contents("https://api.meetup.com/GDGRzeszow/events?&sign=true&photo-host=public&&status=past&key=786d2a84355b393715e1c5f4174a")));


?>

<div class="timeline">
  <h3>Wydarzenia</h3>
  <div class="events">
      <?php foreach ($events as $key => $event) {
          ?>
        <div class="event<?php if ($event === end($events)) echo ' active' ?>">
          <a target="__blank" href="<?php echo $event->link; ?>">
            <h2><?php echo $event->name; ?></h2></a>
          <a target="__blank" href="<?php echo $event->link; ?>">
            <date><?php echo date_i18n('j F Y', ($event->time / 1000)); ?></date>
          </a>
        </div>
          <?php
      } ?>
    <div class="event past">
      <h2><?php echo $past[0]->name; ?></h2>
      <date><?php echo date_i18n('j F Y', ($past[0]->time / 1000)); ?></date>
    </div>
  </div>
  <div class="start">
    <h2>Start GDG Rzeszow</h2>
    <date>Luty 2016</date>
  </div>
</div>
