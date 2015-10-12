<?php

class Tumjudge {
  public function after_parse_content(&$content) {
    $instances = array(
      array('path' => 'ConPra', 'name' => 'Algorithms for Programming Contests', 'color' => '#00f090'),
      array('path' => 'Contest', 'name' => 'Preparation for the ACM ICPC', 'color' => '#0090f0'),
      array('path' => 'GAD', 'name' => 'Foundations: Algorithms and Data Structures', 'color' => '#9000f0'),
      array('path' => 'Isabelle', 'name' => 'Proving Contests', 'color' => '#f00090'),
    );
    $tumjudge_contests = '
      <table>
        <tr>
          <th>TUMjudge Instance</th>
          <th>Current Contests</th>
          <th>Future Contests</th>
          <th>Past Contests</th>
        </tr>
    ';
    foreach($instances AS $instance) {
      $tumjudge_contests .= '
        <tr class=\''.strtolower($instance['path']).'\'>
          <td style=\'vertical-align: top;\'><div style=\'font-weight: bold; border-left: 10px solid '.$instance['color'].'; padding-left: 20px;\'>
            <a href=\'/'.strtolower($instance['path']).'/\'>TUMjudge '.$instance['path'].'</a></div>'.$instance['name'].'<div class=\'stats\' style=\'color: #c0c0c0\'>Loading statistics...</div></td>
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
                  $(".'.strtolower($instance['path']).' .current").append(contest.name + "<br />");
                }
              }
              else if(contest.start >= new Date().getTime()/1000) {
                '.strtolower($instance['path']).'future++;
                if('.strtolower($instance['path']).'future <= 3) {
                  $(".'.strtolower($instance['path']).' .future").append(contest.name + "<br />");
                }
              }
              else if(contest.end <= new Date().getTime()/1000) {
                '.strtolower($instance['path']).'past++;
                if('.strtolower($instance['path']).'past <= 3) {
                  $(".'.strtolower($instance['path']).' .past").append(contest.name + "<br />");
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
