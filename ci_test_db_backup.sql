-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 01:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL DEFAULT '1' COMMENT 'default=1 for UK',
  `subscription_for` varchar(10) NOT NULL COMMENT '0=story, 1=comment, 2=poll',
  `role` tinyint(1) NOT NULL COMMENT 'role=0 user, role=1 admin',
  `verified_user` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `first_name`, `last_name`, `phone_number`, `date_of_birth`, `email`, `password`, `country`, `subscription_for`, `role`, `verified_user`, `hash`) VALUES
(1, 'Admin', 'User', '9876543120', '1992-11-20', 'admin@demo.com', '0e7517141fb53f21ee439b355b5a1d0a', 1, 'story', 1, 1, '144194b941960b62a1217cc9d27ebdbe'),
(5, 'jopsy', 'varghese', '+44 7222 555 555', '2017-12-02', 'jopsyvarghese@gmail.com', '1a5533fc86e0476b89a96afd61ce026c', 1, 'comment', 0, 1, '51801a51b9d3d7cb8e0702df67609a27'),
(8, 'jomit', 'jose', '+44 7222 555 555', '1990-02-02', 'jomit@gmail.com', '5c9a5fb7ab649e987189f3617440f3f9', 1, 'story', 0, 1, 'e0d3336caa3bf40ceae5b4efeeedf541'),
(9, 'labeesh', 'lakshmanan', '+44 7222 555 555', '1990-02-02', 'labeesh@gmail.com', '33bc2b6407f4313f75eae223f74e24fa', 1, 'poll', 0, 1, '75519d68dc7afbf1a89ff754ce6d02af');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE `hits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `story_text` text,
  `url` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `story_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`id`, `user_id`, `title`, `author`, `story_text`, `url`, `comment`, `story_title`) VALUES
(183, 8, 'Stephen Hawking has died on 1978', 'Cogito', 'His story', 'http://www.bbc.com/news/uk-43396008', '', ''),
(184, 8, 'A Message to Our Customers', 'epaga', NULL, 'http://www.apple.com/customer-letter/', NULL, NULL),
(185, 8, 'Steve Jobs has passed away.', 'patricktomas', '', 'http://www.apple.com/stevejobs/', NULL, NULL),
(186, 8, 'YouTube-dl has received a DMCA takedown from RIAA', 'phantop', NULL, 'https://github.com/github/dmca/blob/master/2020/10/2020-10-23-RIAA.md', NULL, NULL),
(187, 8, 'Reflecting on one very, very strange year at Uber', 'grey-area', NULL, 'https://www.susanjfowler.com/blog/2017/2/19/reflecting-on-one-very-strange-year-at-uber', NULL, NULL),
(188, 8, 'Bye, Amazon', 'grey-area', NULL, 'https://www.tbray.org/ongoing/When/202x/2020/04/29/Leaving-Amazon', NULL, NULL),
(189, 8, 'Every Google result now looks like an ad', 'cmod', NULL, 'https://twitter.com/craigmod/status/1219644556003565568', NULL, NULL),
(190, 8, 'F.C.C. Repeals Net Neutrality Rules', 'panny', NULL, 'https://www.nytimes.com/2017/12/14/technology/net-neutrality-repeal-vote.html', NULL, NULL),
(191, 8, 'Show HN: This up votes itself', 'olalonde', '', 'http://news.ycombinator.com/vote?for=3742902&dir=up&whence=%6e%65%77%65%73%74', NULL, NULL),
(192, 8, 'Switch from Chrome to Firefox', 'WisNorCan', NULL, 'https://www.mozilla.org/en-US/firefox/switch/', NULL, NULL),
(193, 5, NULL, 'zedshaw', NULL, NULL, 'Hey, other comments are going to give you a few lines telling you to not quit, that you should hang in there, and that it&#x27;ll be alright.  That may be true, but to me it sounds like you&#x27;re possibly not doing well enough to make any of that possib', 'Started a stupid company. Failed. '),
(194, 5, '', 'avalaunch', NULL, '', 'The other commenters are being too nice in their replies.<p>You&#x27;re full of shit.  JustFab is a shoe of the month club masquerading as a normal online shoe store.  The VIP Membership Program is the essence of JustFab&#x27;s business model and yet it&#', 'Why can a scam company raise $40 Million Series C + $76 Million Series B?'),
(195, 5, '', 'sivers', NULL, '', 'Theres this great story from the book Art and Fear, that&#x27;s very appropriate here:<p>===<p>The ceramics teacher announced on opening day that he was dividing the class into two groups.<p>All those on the left side of the studio, he said, would be grad', 'I\'m learning to code by building 180 websites in 180 days. Today is day 115'),
(196, 5, NULL, 'mattmight', NULL, NULL, '(There&#x27;s a shout-out to HN in the article.)<p>Two years ago, HN was the first to pick up on a post I wrote about my son&#x27;s preliminary diagnosis via experimental exome sequencing:<p><a href=\"https://news.ycombinator.com/item?id=4038113\" rel=\"nofo', 'Thanks, HN: You helped discover a disease and save lives'),
(197, 5, NULL, 'jbk', NULL, NULL, 'As the main developer of VLC, we know about this story since a long time, and this is just Dell putting crap components on their machine and blaming others. Any discussion was impossible with them. So let me explain a bit...<p>In this case, VLC just uses ', 'Installing VLC Media Player voids your speaker warranty'),
(198, 5, NULL, '6cxs2hd6', NULL, NULL, 'As I type this comment, most other comments are pointing out how a 6th grader got this wrong, by failing to suggest the &quot;correct&quot; solution of abandoning printing.<p>I don&#x27;t... how do I put this nicely.<p>This is a kid. He is smart. He looke', 'Teen to government: Change your typeface, save millions'),
(199, 5, NULL, 'lawl', NULL, NULL, 'Damn! I don&#x27;t like this.<p>I had hoped they jump in bed with valve.<p>Yes, I just really dislike facebook, so I hate to see them aquiring something i was really excited about.<p>Also from the article:<p>&gt; <i>After games, we&#x27;re going to make O', 'Facebook acquires Oculus VR'),
(200, 5, NULL, 'shasta', NULL, NULL, 'Is she comfortable with the fact that it was primarily an IP acquisition?', '\"I\'ve got an idea for an app\"'),
(201, 5, '', 'jbk', NULL, '', 'I can speak quite a bit about this \"industry\": We (VLC) receive 1 of those offers per day.<p>They are liars, shady business, IP violators and are downright dangerous.<p>They have all those great offers for you, but they refuse to give any details as soon ', 'Y Combinator is funding the future of spam in Windows'),
(202, 5, '', 'mapgrep', NULL, '', 'This is empty madness. It is, very literally, a celebration of total materialism.<p>What is ultimately important in life are people -- messy, filthy, bacteria-and-disease-laden, imperfect, emotional, sweating shitting cursing crying screaming laughing far', 'The Best'),
(203, 9, 'Poll: What\'s Your Favorite Programming Language?', 'GreekOphion', 'What\'s your favortie programming langauge?<p>Below are the most popular languages. If your favorite isn\'t below select other and comment what it is below.<p>Note: By voting for a language you are not up voting this poll. Please up vote this poll to keep it alive.', NULL, NULL, NULL),
(204, 9, 'Poll: Where are you currently living?', 'Systemic33', 'An interesting question, that was last asked according to search, 3,4 and respectively 5 years ago. [1,2,3]<p>Please read through the list, to find the choice that describes you the best.<p>I&#x27;ve tried to be more precise than just continents, but still not every country, but rather regions, more or less divided by culture.\\nI apologize if anyone feel left out, please leave a comment then with what region&#x2F;country that you feel is significant enough to warrant it&#x27;s own choice.<p>[1] https:&#x2F;&#x2F;news.ycombinator.com&#x2F;item?id=527681<p>[2] http:&#x2F;&#x2F;news.ycombinator.com&#x2F;item?id=1640384<p>[3] http:&#x2F;&#x2F;news.ycombinator.com&#x2F;item?id=235585<p>Remember to upvote the Poll itself, for better results.', NULL, NULL, NULL),
(205, 9, 'Poll: How long have you been programming?', 'michaelkscott', '', NULL, NULL, NULL),
(206, 9, 'Poll: HN readers, where\'s your residence?', 'sasvari', 'So fellow HN readers, where have you set up your residence?<p>(I\'m aware of the fact that the majority is located in the US, but it might still be interesting to see if the HN community is getting more international.)<p>(Edit: NYC and SF area choice; England -&#62; UK; split up Asia;Australia/+Oceania)', NULL, NULL, NULL),
(207, 9, 'Poll: Do you think HN should go dark in protest of SOPA?', 'zitterbewegung', 'I think Hacker News should stand with reddit to go dark in support of SOPA. SOPA seems very important for the future of HN and startups associated with ycombinator.', NULL, NULL, NULL),
(208, 9, 'Poll: Full-time software engineers in the Bay Area, what\'s your annual salary?', 'kanzure', 'This poll is targeting current full-time software engineers and software developers in San Francisco and the Bay Area.<p>The previous polls seem to have topped out too low. So here we are again.<p>Specifically, base salary only. Pre-tax. No options, shares, bonuses, adjustments for inflation, or benefits.<p>(Don\'t forget to up-vote the poll to get more data.)', NULL, NULL, NULL),
(209, 9, 'Poll: What database does your company use?', 'daniel_levine', '<i></i>Upvote please if you think it\'s an interesting question so that more people will respond<i></i><p>Last year I asked this question (http://news.ycombinator.com/item?id=1411937) and I think it was useful to a bunch of people. Figured it\'s worth asking again and the diffs will be interesting.', NULL, NULL, NULL),
(210, 9, 'Poll: What are your liked and disliked programming languages?', 'wting', 'This is a combination of these two polls:<p><pre><code>    https:&#x2F;&#x2F;news.ycombinator.com&#x2F;item?id=3746692\\n    https:&#x2F;&#x2F;news.ycombinator.com&#x2F;item?id=3748961\\n</code></pre>\\nThat resulted in this chart:<p><pre><code>    https:&#x2F;&#x2F;i.imgur.com&#x2F;toGKy21.jpg\\n</code></pre>\\nSince that poll is ~18 months old, I thought an update is in order.<p>This poll also adds a few new choices: F#, Go, R, and Rust.<p>Vote as many choices as you&#x27;d like.<p>Note: By voting for a language you are not up voting this poll. Please up vote this poll to keep it alive.', NULL, NULL, NULL),
(211, 9, 'Poll: Should HN display comment scores?', 'pg', 'It\'s now been long enough since I hid comment scores that we know\\nwhat the site will be like without them.  Do you prefer the site\\nnow or the way it used to be?<p>I hid comment scores after tptacek suggested it as a way to reduce\\narguments.  There was a nasty kind of argument that used to happen,\\nwhere people would literally try to score points off one another,\\nand users voting on the thread became like a mob egging on two\\npeople fighting. I prefer HN without comment scores, because those\\nfights really disturbed me, and they\'ve practically gone away since\\nI hid comment scores.<p>I realize there is another side to the story, though.  Lots of\\npeople have complained that without comment scores it\'s harder to\\npick out the good comments.  Some say that\'s better, because now\\nyou have to judge a comment for itself.  On the other hand, with\\nsufficient discipline one could presumably judge a comment for\\nitself despite seeing the score.<p>Last time I tried asking this question, the voting was roughly even.\\nI\'m curious if there has been any drift toward a consensus.', NULL, NULL, NULL),
(212, 9, 'Poll: Do you test your code?', 'petenixey', 'Do you have tests that run every time you push and ensure that the functionality on your site works?<p>There\'s always a lot of debate around testing and I\'m interested to see how much people do and how satisfied they are with it<p>IF YOU\'D LIKE TO ENCOURAGE OTHERS TO ANSWER, PLEASE UPVOTE - TY', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hits`
--
ALTER TABLE `hits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hits`
--
ALTER TABLE `hits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
