/*
Title: TUM NWERC Selection Process 2020
Description: How to represent TUM in the NWERC 2020
Date: 2020/07/26
Template: news
*/


As every year it is about time to decide who is going to represent TUM in the [<span style="color:darkblue">**2020 ICPC Northwestern Europe Regional Contest (NWERC)**</span>](https://www.nwerc.eu/). Due to the COVID-19-pandemic it is not clear at this point in which format (onsite in Iceland or remote) the NWERC 2020 is going to take place. Nevertheless, we would like to proceed with our usual selection process so that we are prepared for any scenario. Similar to previous years, we assume that TUM will be granted between 2 and 4 (most likely 3) spots in the NWERC 2020. As each team consists of up to 3 students, there will be in total 6 to 12 students able to qualify for the NWERC. After careful deliberation, we came up with quite an involved selection procedure last year that enjoyed a high popularity among our students. We therefore decided to conduct a similar selection procedure this year. It is based on student's performance in a number of upcoming online contests. Please read the details below and contact us in case you have any questions or would like to enter the selection process.

<br/>

**Eligibility**

Everyone who is (or will be) enrolled as a TUM student in the winter semester 2020/2021 and is eligible to participate in the NWERC 2020 according to the official [<span style="color:darkblue">**2020 ICPC Regionals Eligibility Decision Diagram**</span>](https://icpc.global/xwiki/wiki/public/download/regionals/rules/EligibilityDecisionTree-2020.pdf) is welcome to participate in our TUM NWERC selection process. In case you want to take part in the selection process, please contact us and send us your handles on the various contest platforms.


<br/>

**Selection Period**

27.07.2020 - 30.09.2020 (may be extended)

<br/>

**Ranked Contest**

- Atcoder Grand Contests
- Codeforces Educational Contests
- Codeforces Global Contests
- Codeforces combined Div1 & Div2 Contests and exclusive Div1 Contests (both types are rare, though)
- Additional suitable contests may be included by the TUM organization team (a.k.a. ’the Gregors’) once they are announced

<br/>

**Scoring Function**

For each ranked contest, every student gets assigned a score measuring his/her performance in the contest. The score takes into account how many tasks a student solved and how difficult those tasks were. It is calculated as follows:
- Every task gets assigned a number of points after the contest. For task i this is p_i = (1 - log(percentage of solutions for the task among all contestants in the contest)) (natural logarithm)
For example if there are 10 000 contestants and m contestants solve a task, this task gives: m = 10 000: 1, m = 8000: 1.22, m = 5000: 1.69, m = 2500: 2.39, m = 1000: 3.3, m = 500: 4, m = 250: 4.69, m = 100: 5.61, m = 50: 6.3, m = 25: 6.99, m = 10: 7.91, m = 5: 8.6, m = 2: 9.52, m = 1: 10.21 points.
- Then, a preliminary score is calculated for every contestant. For contestant j, this is c_j = sum over each task i of (1 if solved and 0 otherwise) * p_i
- Finally, the score of every contestant is computed as s_j = c_j / (average preliminary score among all contestants in the contest)
“All contestants” refers to the number of people that uploaded at least one submission.

For the selection process, every participant is then assigned a total score based on his/her performances in the contests during the selection period. This total score t_j is the sum of the scores s_j of this participant in the individual contests, but only taking the best ceil(n / 2) contests of the participant into account, where "n" is the number of ranked contests taking place within the selection period.

In case multiple contests take place on the same day, the parameter “n” will increase only by 1, even though 2 contests take place on this day. Students may, however, compete in both contests if they like.


<br/>

**Forming Teams**

The best 9 participants according to their total score in the selection process create teams through a public discussion. If no consensus can be achieved, we use the following strategy:
Students are ranked according to their individual scores. Ties are broken uniformly at random. The student with the best rank may now start to select his/her teammates. The student can ask any student who participated in the selection process to be his/her teammate. The student’s potential teammate can accept or reject this request. Once a team is formed, the student with the highest individual score but unassigned to a team may choose his/her teammates, and so on.

<br/>


**Telegram Group & Selection Bot**

Some of our students wrote a great [<span style="color:darkblue">**Telegram bot**</span>](https://github.com/florianjuengermann/tum-nwerc-selection) that automatically fetches the contest data from various platforms, calculates the new scores, and pushes these scores into our ICPC TUM Telegram group. In case you want to join this group, please contact us!

<br/>

**Contact**

Gregor Matl & Gregor Schwarz<br/>
icpc@in.tum.de



{{ comments }}
