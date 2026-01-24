Day 2 - Advent of Code 2016window.addEventListener('click', function(e,s,r){if(e.target.nodeName==='CODE'&&e.detail===3){s=window.getSelection();s.removeAllRanges();r=document.createRange();r.selectNodeContents(e.target);s.addRange(r);}});[Advent of Code](/)
===================

- [\[About\]](/2016/about)
- [\[Events\]](/2016/events)
- [\[Shop\]](/2016/shop)
- [\[Log In\]](/2016/auth/login)



 var y=[2016](/2016);
=====================

- [\[Calendar\]](/2016)
- [\[AoC++\]](/2016/support)
- [\[Sponsors\]](/2016/sponsors)
- [\[Leaderboards\]](/2016/leaderboard)
- [\[Stats\]](/2016/stats)



Our [sponsors](/2016/sponsors) help make Advent of Code possible:

[eSpark Learning](/2016/sponsors/redirect?url=https%3A%2F%2Finfo%2Eesparklearning%2Ecom%2Fjoin%2Dour%2Dteam%2Dfull%2Dstack%2Dengineer) - Solve the greatest puzzle of our day - transform education





--- Day 2: Bathroom Security ---
--------------------------------

You arrive at *Easter Bunny Headquarters* under cover of darkness. However, you left in such a rush that you forgot to use the bathroom! Fancy office buildings like this one usually have keypad locks on their bathrooms, so you search the front desk for the code.

"In order to improve security," the document you find says, "bathroom codes will no longer be written down. Instead, please memorize and follow the procedure below to access the bathrooms."

The document goes on to explain that each button to be pressed can be found by starting on the previous button and moving to adjacent buttons on the keypad: `U` moves up, `D` moves down, `L` moves left, and `R` moves right. Each line of instructions corresponds to one button, starting at the previous button (or, for the first line, *the "5" button*); press whatever button you're on at the end of each line. If a move doesn't lead to a button, ignore it.

You can't hold it much longer, so you decide to figure out the code as you walk to the bathroom. You picture a keypad like this:

```
1 2 3
4 5 6
7 8 9

```

Suppose your instructions are:

```
ULL
RRDDD
LURDL
UUUUD

```

- You start at "5" and move up (to "2"), left (to "1"), and left (you can't, and stay on "1"), so the first button is `1`.
- Starting from the previous button ("1"), you move right twice (to "3") and then down three times (stopping at "9" after two moves and ignoring the third), ending up with `9`.
- Continuing from "9", you move left, up, right, down, and left, ending with `8`.
- Finally, you move up four times (stopping at "2"), then down once, ending with `5`.

So, in this example, the bathroom code is `1985`.

Your puzzle input is the instructions from the document you found at the front desk. What is the *bathroom code*?

To play, please identify yourself via one of these services:

[\[GitHub\]](/auth/github) [\[Google\]](/auth/google) [\[Twitter\]](/auth/twitter) [\[Reddit\]](/auth/reddit) - [\[How Does Auth Work?\]](/2016/about#faq_auth)


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-69522494-1', 'auto');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview');
