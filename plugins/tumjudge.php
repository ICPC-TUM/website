<?php

class Tumjudge {
  public function after_parse_content(&$content) {
  
    // {{ tumjudge contests }}
    if(strpos($content, '{{ tumjudge contests }}') !== false) {
    $instances = array(
      array('name' => 'ConPra', 'path' => 'conpra', 'description' => 'Lecture &ldquo;Algorithms for Programming Contests&rdquo;', 'color' => '#2ece0c'),
      array('name' => 'Contest', 'path' => 'contest', 'description' => 'Preparation for the ACM ICPC', 'color' => '#0c99ce'),
      array('name' => 'GAD', 'path' => 'gad', 'description' => 'Lecture &ldquo;Foundations: Algorithms and Data Structures&rdquo;', 'color' => '#0c5bce'),
      array('name' => 'Isabelle', 'path' => 'isabelle', 'description' => 'Proving Contests', 'color' => '#1f0cee'),
      array('name' => 'GCPC', 'path' => 'judge', 'description' => 'German Collegiate Programming Contest', 'color' => '#800cce'),
      array('name' => 'IOI Germany', 'path' => 'ioide', 'description' => 'Preparation for the IOI', 'color' => '#ce0c82'),
      array('name' => 'IOI Austria', 'path' => 'ioiat', 'description' => 'Preparation for the IOI', 'color' => '#ff0000'),
      array('name' => 'Challenge', 'path' => 'challenge', 'description' => 'Yet Another Programming Contest', 'color' => '#ff6000'),
      array('name' => 'MLR', 'path' => 'mlr', 'description' => 'Lecture &ldquo;Machine Learning in Robotics&rdquo;', 'color' => '#ff9a00'),
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
        <tr class=\''.$instance['path'].'\' style=\'border-bottom: 1px solid #002143;\'>
          <td style=\'vertical-align: top;\'><div style=\'font-weight: bold; border-left: 10px solid '.$instance['color'].'; padding-left: 20px;\'>
            <a href=\'https://judge.in.tum.de/'.$instance['path'].'/\'>TUMjudge '.$instance['name'].'</a></div>'.$instance['description'].'<div class=\'stats\' style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>Loading statistics...</div></td>
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
          $.ajax({url: "https://judge.in.tum.de/'.$instance['path'].'/api/contests"}).done(function(data) {
            $(".'.$instance['path'].' .current, .'.$instance['path'].' .future, .'.$instance['path'].' .past").html("");
            var '.$instance['path'].'current = 0, '.$instance['path'].'future = 0, '.$instance['path'].'past = 0;
            $.each(data, function(id, contest) {
              if(contest.start < new Date().getTime()/1000 && contest.end > new Date().getTime()/1000) {
                '.$instance['path'].'current++;
                if('.$instance['path'].'current <= 3) {
                  $(".'.$instance['path'].' .current").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>end: " + formatDate(new Date(contest.end*1000)) + "</div>");
                }
              }
              else if(contest.start >= new Date().getTime()/1000) {
                '.$instance['path'].'future++;
                if('.$instance['path'].'future <= 3) {
                  $(".'.$instance['path'].' .future").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>start: " + formatDate(new Date(contest.start*1000)) + "</div>");
                }
              }
              else if(contest.end <= new Date().getTime()/1000) {
                '.$instance['path'].'past++;
                if('.$instance['path'].'past <= 3) {
                  $(".'.$instance['path'].' .past").append("<div>" + contest.name + "</div><div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>end: " + formatDate(new Date(contest.end*1000)) + "</div>");
                }
              }
            });
            if('.$instance['path'].'current == 0) {  
              $(".'.$instance['path'].' .current").append("none");
            }
            else if('.$instance['path'].'current > 3) {  
              $(".'.$instance['path'].' .current").append("...and " + ('.$instance['path'].'current - 3) + " more");
            }
            if('.$instance['path'].'future == 0) {  
              $(".'.$instance['path'].' .future").append("none");
            }
            else if('.$instance['path'].'future > 3) {  
              $(".'.$instance['path'].' .future").append("...and " + ('.$instance['path'].'future - 3) + " more");
            }
            if('.$instance['path'].'past == 0) {  
              $(".'.$instance['path'].' .past").append("none");
            }
            else if('.$instance['path'].'past > 3) {  
              $(".'.$instance['path'].' .past").append("...and " + ('.$instance['path'].'past - 3) + " more");
            }
          }).fail(function() {
            $(".'.$instance['path'].' .current").html("<div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>server offline</div>");
            $(".'.$instance['path'].' .future").html("<div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>server offline</div>");
            $(".'.$instance['path'].' .past").html("<div style=\'color: #c0c0c0; padding-bottom: 0.2em;\'>server offline</div>");
          });
          $.ajax({url: "https://judge.in.tum.de/'.$instance['path'].'/api/statistics"}).done(function(data) {
            $(".'.$instance['path'].' .stats").html(data.submissions + " submissions in " + data.contests + " contests by " + data.teams + " teams");
          }).fail(function() {
            $(".'.$instance['path'].' .stats").html("server offline");          
          });
        </script>      
      ';
    }
    $content = preg_replace('/\{\{ tumjudge contests \}\}/', $tumjudge_contests, $content);
    }
    
    // {{ comments }}
    if(strpos($content, '{{ comments }}') !== false) {
    $comments = '
      <div id="discourse-comments"></div>
      <script type="text/javascript">
        DiscourseEmbed = { discourseUrl: "https://judge.in.tum.de/discuss/",
                           discourseEmbedUrl: "https://icpc.tum.de'.$_SERVER[REQUEST_URI].'" };
        (function() {
          var d = document.createElement("script"); d.type = "text/javascript"; d.async = true;
          d.src = DiscourseEmbed.discourseUrl + "javascripts/embed.js";
          (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(d);
        })();
      </script>
    ';
    $content = preg_replace('/\{\{ comments \}\}/', $comments, $content);
  }
  }
}
