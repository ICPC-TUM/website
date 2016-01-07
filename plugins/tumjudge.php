<?php

class Tumjudge {
  public function after_parse_content(&$content) {
    $instances = array(
      array('path' => 'ConPra', 'name' => 'Algorithms for Programming Contests', 'color' => '#2ece0c'),
      array('path' => 'Contest', 'name' => 'Preparation for the ACM ICPC', 'color' => '#0c99ce'),
      array('path' => 'GAD', 'name' => 'Foundations: Algorithms and Data Structures', 'color' => '#0c5bce'),
      array('path' => 'Isabelle', 'name' => 'Proving Contests', 'color' => '#1f0cee'),
      array('path' => 'GCPC', 'name' => 'German Collegiate Programming Contest', 'color' => '#800cce'),
      array('path' => 'IOI Germany', 'name' => 'Preparation for the IOI', 'color' => '#ce0c82'),
      array('path' => 'IOI Austria', 'name' => 'Preparation for the IOI', 'color' => '#ff0000'),
      array('path' => 'Challenge', 'name' => 'Yet Another Programming Contest', 'color' => '#ff6000'),
    );
    $tumjudge_contests = '
      <script>
      function formatDate(date) {
        var d = date.getDate();
        var m = date.getMonth() + 1;
        var y = date.getFullYear();
        var h = date.getHours();
        var mi = date.getMinutes();
        return (d <= 9 ? \'0\' + d : d) + \'.\' + (m <= 9 ? \'0\' + m : m) + \'.\' + y + \' \' + (h <= 9 ? \'0\' + h : h) + \':\' + (mi <= 9 ? \'0\' + mi : mi);
      }
      </script>
      <table style=\'width: 100%;\'>
        <tr>
          <th>TUMjudge Instance</th>
          <th>Current Contests</th>
          <th>Future Contests</th>
          <th>Past Contests</th>
        </tr>
    ';
    foreach($instances AS $instance) {
      $tumjudge_contests .= '
        <tr class=\''.strtolower($instance['path']).'\' style=\'border-bottom: 1px solid #002143;\'>
          <td style=\'vertical-align: top;\'><div style=\'font-weight: bold; border-left: 10px solid '.$instance['color'].'; padding-left: 20px;\'>
            <a href=\'/'.strtolower($instance['path']).'/\'>TUMjudge '.$instance['path'].'</a></div>'.$instance['name'].'<div class=\'stats\' style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>Loading statistics...</div></td>
          <td class=\'current\' style=\'vertical-align: top;\'>Loading...</td>
          <td class=\'future\' style=\'vertical-align: top;\'>Loading...</td>
          <td class=\'past\' style=\'vertical-align: top;\'>Loading...</td>
        </tr>
      ';
    }
    $tumjudge_contests .= '</table>';
    foreach($instances AS $instance) {
      $tumjudge_contests .= '
        <script>
          $.ajax({url: "/'.strtolower($instance['path']).'/api/contests"}).done(function(data) {
            $(".'.strtolower($instance['path']).' .current, .'.strtolower($instance['path']).' .future, .'.strtolower($instance['path']).' .past").html("");
            var '.strtolower($instance['path']).'current = 0, '.strtolower($instance['path']).'future = 0, '.strtolower($instance['path']).'past = 0;
            $.each(data, function(id, contest) {
              if(contest.start < new Date().getTime()/1000 && contest.end > new Date().getTime()/1000) {
                '.strtolower($instance['path']).'current++;
                if('.strtolower($instance['path']).'current <= 3) {
                  $(".'.strtolower($instance['path']).' .current").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>end: " + formatDate(new Date(contest.end*1000)) + "</div>");
                }
              }
              else if(contest.start >= new Date().getTime()/1000) {
                '.strtolower($instance['path']).'future++;
                if('.strtolower($instance['path']).'future <= 3) {
                  $(".'.strtolower($instance['path']).' .future").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>start: " + formatDate(new Date(contest.start*1000)) + "</div>");
                }
              }
              else if(contest.end <= new Date().getTime()/1000) {
                '.strtolower($instance['path']).'past++;
                if('.strtolower($instance['path']).'past <= 3) {
                  $(".'.strtolower($instance['path']).' .past").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>end: " + formatDate(new Date(contest.end*1000)) + "</div>");
                }
              }
            });
            if('.strtolower($instance['path']).'current == 0) {  
              $(".'.strtolower($instance['path']).' .current").append("none");
            }
            else if('.strtolower($instance['path']).'current > 3) {  
              $(".'.strtolower($instance['path']).' .current").append("...and " + ('.strtolower($instance['path']).'current - 3) + " more");
            }
            if('.strtolower($instance['path']).'future == 0) {  
              $(".'.strtolower($instance['path']).' .future").append("none");
            }
            else if('.strtolower($instance['path']).'future > 3) {  
              $(".'.strtolower($instance['path']).' .future").append("...and " + ('.strtolower($instance['path']).'future - 3) + " more");
            }
            if('.strtolower($instance['path']).'past == 0) {  
              $(".'.strtolower($instance['path']).' .past").append("none");
            }
            else if('.strtolower($instance['path']).'past > 3) {  
              $(".'.strtolower($instance['path']).' .past").append("...and " + ('.strtolower($instance['path']).'past - 3) + " more");
            }
          });
          $.ajax({url: "/'.strtolower($instance['path']).'/api/statistics"}).done(function(data) {
            $(".'.strtolower($instance['path']).' .stats").html(data.submissions + " submissions in " + data.contests + " contests by " + data.teams + " teams");
          });
        </script>      
      ';
    }
    $content = preg_replace('/\{\{ tumjudge contests \}\}/', $tumjudge_contests, $content);
  }
}
