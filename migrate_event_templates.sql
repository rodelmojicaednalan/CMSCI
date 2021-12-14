# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.40)
# Database: boomity_group_generic
# Generation Time: 2019-04-16 01:39:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table event_templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_templates`;

CREATE TABLE `event_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `body` longtext,
  `thumbnail` text,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `event_templates` WRITE;
/*!40000 ALTER TABLE `event_templates` DISABLE KEYS */;

INSERT INTO `event_templates` (`id`, `name`, `body`, `thumbnail`, `status`)
VALUES
	(1,'Conference','<main role=\"main\">\n  <section>\n    <div class=\"container\">\n      <div class=\"row\">\n        <div class=\"col\"></div>\n        <!--end col-->\n      </div>\n      <!--end Row-->\n    </div>\n    <!--end container-->\n  </section>\n  <!--end section-->\n  <!-- / works -->\n  <!--divider-->\n  <!--THE MAIN IMAGE REPLACEMENT WILL NEED TO GO INTO THE CSS BELOW AFTER URL-->\n  <style type=\"text/css\">\n    .bg-cover {\n      background: url(\"/assets/images/demo/event/sanfrancisco-2000x1333.jpg\")\n        no-repeat center center;\n      padding-top: 20%;\n      padding-bottom: 20%;\n      -webkit-background-size: cover;\n      -moz-background-size: cover;\n      background-size: cover;\n      -o-background-size: cover;\n    }\n  </style>\n  <div class=\"jumbotron jumbotron-fluid bg-cover\">\n    <div class=\"container\">\n        \n        <div class=\"froala-container-temp\">\n      <h1 class=\"display-1 text-white strong\" itemprop=\"name\">\n        #event_title#\n      </h1>\n      \n      </div>\n      <!--this is the Event Title-->\n      <!--Event Short Description -->\n      <div class=\"froala-container-temp\">\n      <h4 class=\"text-white strong\">\n        #event_description#\n      </h4>\n      </div>\n      \n      <!--Optional Call to Action Button -->\n      <p class=\"mt-2\">\n        <a class=\"btn btn-primary btn-lg\" href=\"#\" role=\"button\"\n          >Learn more &raquo;</a\n        >\n      </p>\n      \n    </div>\n    <!--This is the IMage overlay - it\'s blocking the text <div class=\"image image-overlay\"></div>-->\n </div><!--end jumbotron-->\n\n  <div class=\"container mb-3\">\n    <div class=\"row justify-content-center\">\n      <div class=\"col-md-5\">\n        <!--this is the Subhead-->\n        <div class=\"froala-container\">\n        <h2>Preparing for Success in the Next Decade</h2>\n        </div>\n      </div><!--end col-->\n      <div class=\"col-md-5\">\n          <div class=\"froala-container\">\n        <h2>&nbsp;</h2>\n        </div>\n      </div>\n    </div>\n    <!--end col row-->\n    <div class=\"row justify-content-center\">\n      <div class=\"col-md-10\">\n        <!--event long description-->\n        <div class=\"froala-container\">\n        <p>\n          The CAAE Summer Institute is held concurrently with the CASE Summit for Leaders in Advancement. This “meeting within a meeting” provides members with an opportunity to engage in high-level conversations with other advancement leaders around the issues and challenges facing higher education.\n        </p>\n        </div>\n      </div>\n    </div>\n  </div><!--end container-->\n<!--begin venue section-->\n  <section class=\"bg-light\">\n    <div class=\"container-fluid\">\n      <div class=\"row p-4 justify-content-center\">\n        <div class=\"col-md-5\">\n          <!-- Event Venue Card -->\n          <div class=\"card m-2\">\n            <div class=\"card-body\">\n                <div class=\"froala-container-temp\">\n              <h3 class=\"card-title\">\n                <i class=\"fas fa-map-marker-alt text-muted\"></i>&nbsp;Venue\n              </h3>\n              <!--Venue name and URL goes between the span tags-->\n              <h5>\n                <span itemprop=\"location\"\n                  ><a\n                    href=\"#event_location_url#\"\n                    title=\"#event_location#\"\n                    >#event_location#</a\n                  ></span\n                >\n              </h5>\n            </div>\n              \n              <div class=\"froala-container-temp\">\n              <ul class=\"list-unstyled\">\n                    <!--street address inbetween the span tags-->\n                    <li>\n                      <span itemprop=\"streetAddress\">#event_address#</span>\n                    </li>\n                    <li>\n                        <ul class=\"list-inline\">\n                          <!--Put City inbetween the span tags-->\n                          <li class=\"list-inline-item\">\n                            <span itemprop=\"addressLocality\">#event_city#</span>,\n                          </li>\n                          <!--put state inbetween the span tags-->\n                          <li class=\"list-inline-item\">\n                            <span itemprop=\"addressRegion\">#event_state#</span>\n                          </li>\n                          <!--put zip/postal code inbetween the span tags-->\n                          <li class=\"list-inline-item\">\n                            <span itemprop=\"postalCode\">#event_zip#</span>\n                          </li>\n                          <!--put country inbetween the span tags-->\n                          <li class=\"list-inline-item\">\n                            <span itemprop=\"addressCountry\">#event_country#</span>\n                          </li>\n                        </ul>\n                    </li>\n                </ul>\n                </div>\n                \n            </div><!--end card body-->\n          </div><!--end card-->\n        </div><!--end col-->\n        <!--end the Venue Card-->\n        <!-- /.Date - Time Card -->\n        <div class=\"col-md-5\">\n          <!-- Event Venue Card -->\n          <div class=\"card m-2\">\n            <div class=\"card-body\">\n              <div class=\"froala-container-temp\">\n                <h3 class=\"card-title\">\n                  <i class=\"far fa-calendar-alt\"></i>&nbsp;Date / Time\n                </h3>\n              </div>\n              <!--Venue name and URL goes between the span tags-->\n              <span itemprop=\"eventSchedule\">\n                <div class=\"froala-container-temp\">\n                  <h5>\n                    <span itemprop=\"startDate\">#event_start_date#</span\n                    >&nbsp;|&nbsp;<span itemprop=\"endDate\"\n                      >#event_end_date#</span\n                    >\n                  </h5>\n                </div>\n                <div class=\"froala-container-temp\">\n                  <ul class=\"list-unstyled\">\n                    <!--schedule inbetween the span tags-->\n                    <li>\n                      <span itemprop=\"name\">Conferences</span\n                      >&nbsp;|&nbsp;<span itemprop=\"startTime\">#event_start_time#</span\n                      >&nbsp;-&nbsp;<span itemprop=\"endTime\">#event_end_time#</span>\n                    </li>\n                    \n                  </ul>\n                </div>\n              </span>\n            </div>\n          </div>\n        </div>\n      </div>\n      <!--end row-->\n    </div>\n  </section>\n  <!-- sections -->\n  <section class=\"section-lg\">\n    <div class=\"container-fluid\">\n      <div class=\"row justify-content-center\">\n        <div class=\"col-md-6 align-self-lg-center\">\n          <div class=\"m-20\">\n            <div class=\"froala-container\">\n              <h4>Fifteenth Annual</h4>\n              <p>\n                Our conference is a friendly inclusive event which is focused on real-world problems and solutions. 2 days, 1 track, 14 speakers, 400 attendees and a bunch of hands-on workshops. Our speakers show how they work, their setup, techniques and shortcuts for getting work done in live interactive sessions. So expect everything from practical reasoning and mindful experience-building to brainstorming and intuitive thoughtfulness, live. Our conference is focused on engagement and retention, but it covers everything education, be it logical presentation mastery or smart momentary ingenuity. That means a packed bundle of diverse, actionable insights for your work.\n              </p>\n              <p>\n                <a\n                  href=\"#\"\n                  class=\"btn btn-lg btn-rounded btn-outline-primary\"\n                  >Save a Spot</a\n                >\n              </p>\n            </div>\n          </div>\n        </div>\n        <!--end col-->\n        <div class=\"col-md-6 m-0 p-0 align-left\">\n          <img\n            class=\"img-fluid\"\n            src=\"/assets/images/demo/event/teemu-paananen-376238-unsplash.jpg\"\n            alt=\"Visit our Conference\"\n          />\n        </div>\n        <!--end col-->\n        <div class=\"w-100\"></div>\n\n        <div class=\"col-md-6 m-0 p-0 align-right\">\n          <img\n            class=\"img-fluid\"\n            src=\"/assets/images/demo/event/mikael-kristenson-242070-unsplash.jpg\"\n            alt=\"Visit our Conference\"\n          />\n        </div>\n        <div class=\"col-md-6 align-self-lg-center\">\n          <div class=\"m-20\">\n            <div class=\"froala-container\">\n              <h4>2019 Participation</h4>\n              <p>\n                The CAAE Summer Sessions at CASE Summit for Leaders in Advancement is a three-day, in-depth exploration of new thinking, creative approaches, and proven best practices in alumni and constituent relations. The annual event takes place in mid-July.\n              </p>\n              <p>\n                <a href=\"#\" class=\"btn btn-lg btn-rounded btn-outline-info\"\n                  >Attend</a\n                >\n              </p>\n            </div>\n          </div>\n        </div>\n        <!--end col-->\n      </div>\n      <!--end row-->\n    </div>\n    <!--end container-->\n  </section>\n  <!--begin speakers section-->\n  <section class=\"bg-light pb-5\">\n    <div class=\"container\">\n      <div class=\"row pt-5 justify-content-center\">\n        <div class=\"col-12 text-center\">\n          <h3 class=\"display-3\">Our Speakers</h3>\n          <h5>Come see some the best and brightest provide new ways of thinking about our industry</h5>\n        </div>\n      </div>\n      <!--end row-->\n      <div class=\"row justify-content-center\">\n        <div class=\"col-12\">\n          <div class=\"card-deck-wrapper\">\n            <div class=\"card-deck\">\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                    <img\n                      class=\"card-img-top\"\n                      src=\"/assets/images/demo/event/speakers/ariana-flambert.png\"\n                      alt=\"Speaker 1\"\n                    />\n                    <div class=\"card-body text-center\">\n                      <h5 class=\"card-title\" itemprop=\"person\">Ariana Flambert</h5>\n                      <p class=\"card-text\">\n                        CEO, ImageSpace\n                      </p>\n                    </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-7.jpg\"\n                    alt=\"Speaker 2\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-3.jpg\"\n                    alt=\"Speaker 3\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-4.jpg\"\n                    alt=\"Speaker 4\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n            </div>\n            <!--end card deck-->\n          </div>\n          <!--end card deck wrapper-->\n        </div>\n        <!--end col-->\n      </div>\n      <!--end row-->\n      <div class=\"row justify-content-center\">\n        <div class=\"col-12\">\n          <div class=\"card-deck-wrapper\">\n            <div class=\"card-deck\">\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-5.jpg\"\n                    alt=\"Speaker 5\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-8.jpg\"\n                    alt=\"Speaker 6\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/avatar-10.jpg\"\n                    alt=\"Speaker 7\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n              <div class=\"card d-block\">\n                <div class=\"froala-container\">\n                  <img\n                    class=\"card-img-top\"\n                    src=\"/assets/images/demo/event/speakers/emerson-migas.png\"\n                    alt=\"Speaker 8\"\n                  />\n                  <div class=\"card-body text-center\">\n                    <h5 class=\"card-title\">Ariana Flambert</h5>\n                    <p class=\"card-text\">\n                      CEO, ImageSpace\n                    </p>\n                  </div>\n                </div>\n              </div>\n              <!-- end card-->\n            </div>\n            <!--end card deck-->\n          </div>\n          <!--end card deck wrapper-->\n        </div>\n        <!--end col-->\n      </div>\n      <!--end row-->\n    </div>\n    <!--end container-->\n  </section>\n  <!--end speaker section-->\n  <!--begin schedule section-->\n  <section>\n    <div class=\"container\">\n      <div class=\"row mt-5 justify-content-center\">\n        <div class=\"col-12 text-center\">\n          <h3 class=\"display-3\">Event Schedule</h3>\n          <h5>Lorem ipsum dolor sit amet consectetur.</h5>\n        </div>\n        <!--end col-->\n      </div>\n      <!--end row-->\n      <div class=\"row mt-5 mb-5 justify-content-center\">\n        <div class=\"col-12\">\n          <div class=\"card\">\n            <div class=\"card-body\">\n              <div class=\"froala-container\">\n                <h4 class=\"header-title\">Schedule</h4>\n              </div>\n              <div class=\"froala-container\">\n                <div class=\"table-responsive-sm\">\n                  <table class=\"table table-striped table-centered mb-0\">\n                    <thead>\n                      <tr>\n                        <th>Date</th>\n                        <th>Time</th>\n                        <th>Speaker</th>\n                        <th>Talk/Workshop</th>\n                        <th>Place</th>\n                      </tr>\n                    </thead>\n                    <tbody>\n                      <tr>\n                        <td>\n                          July 24, 2019\n                        </td>\n                        <td>9:00am-10:30am</td>\n                        <td>Erma Rodriquez</td>\n                        <td>Lorem, ipsum dolor.</td>\n                        <td>\n                          Hall C\n                        </td>\n                      </tr>\n                      <tr>\n                        <td>\n                          July 24, 2019\n                        </td>\n                        <td>9:00am-10:30am</td>\n                        <td>Erma Rodriquez</td>\n                        <td>Lorem, ipsum dolor.</td>\n                        <td>\n                          Hall C\n                        </td>\n                      </tr>\n                      <tr>\n                        <td>\n                          July 24, 2019\n                        </td>\n                        <td>9:00am-10:30am</td>\n                        <td>Erma Rodriquez</td>\n                        <td>Lorem, ipsum dolor.</td>\n                        <td>\n                          Hall C\n                        </td>\n                      </tr>\n                      <tr>\n                        <td>\n                          July 24, 2019\n                        </td>\n                        <td>9:00am-10:30am</td>\n                        <td>Erma Rodriquez</td>\n                        <td>Lorem, ipsum dolor.</td>\n                        <td>\n                          Hall C\n                        </td>\n                      </tr>\n                    </tbody>\n                  </table>\n                </div>\n                <!-- end table-responsive-->\n              </div>\n            </div>\n            <!-- end card body-->\n          </div>\n          <!-- end card -->\n        </div>\n        <!--end col-->\n      </div>\n      <!--end row-->\n    </div>\n    <!--end container-->\n  </section>\n  <!--end schedule section-->\n</main>',NULL,1),
	(2,'Seminars',NULL,NULL,1),
	(3,'Party',NULL,NULL,1);

/*!40000 ALTER TABLE `event_templates` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
