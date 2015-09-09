# Introduction to TUMjudge

## What is TUMjudge?

The TUMjudge is a fork of DOMjudge, one of the most widely used tools that is in use for international programming contests like the ICPC.
We use the TUMjudge to host all sorts of programming contests, for example Preparation Contests for the ICPC or our practice contests that you can use to train for the ICPC. 

## How do I use it?

First, you need to [register](htttp://notfound.com).
We use LDAP to handle all the accounts so there is no need to come up with a new password.
Your account name is identical to the account in the "Rechnerhalle" at TUM (for example *name* in your email adress *name*@tum.de)
This also means that we are not responsible for your password. If you lose it, please contact the [RBG](http://www.in.tum.de/rbg.html), not us.

## Scoreboard
Here you can see how your fellow contestants are doing.
Each column stands for one problem. 

- A *green* field means that he or she solved the problem
- A *dark green* field means that he or she solved the problem **first**.
- A *red* field means that he or she tried the problem, but could not solve it (yet).
- A white field means that he or she did not try to solve the problem (yet).

## Problem Statements
Every problem that you will find here follows an overall structure. It will contain:

- Name
- Difficulty
- A story that describes the problem in informal terms
- A more precise description of the input format
- A more precise description of the output format
- Constraints on the variables that appear in the input/output
- Some sample cases with solutions 

## Solving a Problem
If you think you know how to solve a problem, you can start coding the solution.
You can assume that all testcases satisfy the constraints that are in the problem set.
Therefore you do not have to manually check that these are satisfied.

After you finished your solution and made sure that you think it is correct (by testing your solution thorougly), you can upload your code to the TUMjudge where it will be tested.
For all our problems, we test your program on a lot of testcases. If your program manages to correctly solve all of them, the TUMjudge will accept it and you will have solved the problem.

Please keep in mind that we will test your program on more cases than just the sample input.
This means that you have to think about special/corner cases that could be contained in the input, for example a graph without any edges or containing multiedges.

## Judging
Once you upload your code to our server, there are several possible outcomes that TUMjudge could tell you.
- **CORRECT** This is the best case. You have solved the problem correctly.
- **TIMELIMIT** There is at least one of our testcases where your program takes too long to produce an answer.
- **WRONG ANSWER** There is at least one of our testcases where your program yields a wrong solution.
- **COMPILER-ERROR** TUMjudge could not compile your program. Make sure you chose the right language and all your includes are there. Here you can also see the exact error message.
- **NO-OUTPUT** Your program compiles, but yields no output. Make sure you write the solution to "standard out".
- **TOO-LATE** You submitted your program after the contest was already over. Bummer.

## Clarifications
Here you can ask any questions that you may have.
Depending on the question we can then decide if this is something we should clarify for everybody.
Please send all questions related to problem statements through the clarification system, not via email. 

## Technical Stuff

### Java
#### Version
```
java version "1.8.0_31"
    Java(TM) SE Runtime Environment (build 1.8.0_31-b13)
    Java HotSpot(TM) 64-Bit Server VM (build 25.31-b07,
        mixed mode)
```

#### Compiler Settings
```
java -client -Xdd8m -Xmx1747152k -DONLINE_JUDGE=1 -DDOMJUDGE=1 '$MAINCLASS'
```

### C++

tbd
