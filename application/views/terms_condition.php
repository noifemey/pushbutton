<!DOCTYPE html>
<html lang="en">
<head>
    <title>Terms and Conditions</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://pushbutton-vip.com/assets/images/pushbutton_favicon.png">
</head>
<style>
   
*,
::after,
::before {
    box-sizing: border-box;
}
:root {
    --main_color: #4169e1;
    --grey_color: #a8b3cf;
    --grey_color2: #7a8ebe;
    --yellow_color: #ffd700;
}
body {
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    color: #a1a3ce;
    background-color: #f1f6f9;
    font-size: 14px;
    letter-spacing: 0.4px;
    font-weight: 500;
}
a {
    text-decoration: none;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}
a:hover{
    text-decoration: none;
}
.hide {
    display: none !important;
}
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 100px white inset;
}
img{
    max-width: 100%;
}
ul{
    list-style: none;
    margin: 0;
    padding: 0;
}
h1,h2,h3,h4,h5,h6,p{
    margin: 0;
}
.rcs_btn {
    height: 40px;
    text-transform: capitalize;
    border: none;
    font-size: 12px;
    color: #ffffff;
    font-weight: 700;
    background: var(--main_color);
    border-radius: 5px;
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    transition: all 0.3s;
    display: inline-flex;
    padding: 0 20px;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
}
.rcs_btn:focus {
    outline: none;
}
.rcs_btn:hover {
    color: #ffffff;
    background: var(--main_color);
}
.container {
    max-width: 1200px;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col-lg-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.col-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.col-lg-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
/*--------- privacy box css --------------*/
.rcs_policy_box {
    width: 1170px;
    max-width: 100%;
    margin: 60px auto;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 50px rgba(0,0,0,0.1);
}
.rcs_policy_box .rcs_policy_head {
   background: #fbfdff;
    padding: 20px 30px 15px;
    border-bottom: 1px solid #e7f2f8;
    border-radius: 10px 10px 0 0;
    text-align: center;
}
.rcs_policy_box .rcs_policy_body {
    padding: 30px;
}
.rcs_policy_box .rcs_policy_body h4 {
   margin-top: 0;
    color: #717091;
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 20px;
    text-align: center;
    border-bottom: 1px solid #eaeaea;
    background: #fbfdff;
    border: 1px solid #e7f2f8;
    padding: 10px 0;
    border-radius: 10px;
}
.rcs_policy_box .rcs_policy_body h5 {
    margin: 0px 0 15px;
    font-size: 18px;
    color: #717091;
}
.rcs_policy_box .rcs_policy_body p {
    margin: 0;
    line-height: 1.4;
    margin-bottom: 15px;
}
.rcs_blog_menu {
    display: flex;
    justify-content: flex-end;
}
.rcs_blog_menu .rcs_btn {
    margin-left: 20px;
}
/*--------- header css start -------------*/
.rcs_blog_header {
    background: #ffffff;
    padding: 20px 0;
    box-shadow: 0 0 40px rgba(0,0,0,0.05);
}
.rcs_blog_menu > ul {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}
.rcs_blog_header .row {
    align-items: center;
}
.rcs_blog_menu > ul > li> a {
    color: #717091;
    font-size: 15px;
    margin-bottom: 20px;
    font-weight: 600;
    text-decoration: none;
}
.rcs_blog_menu > ul > li {
    margin-left: 30px;
}
.rcs_blog_menu > ul > li:first-child {
    margin: 0;
}
.rcs_blog_menu > ul > li> a:hover ,.rcs_blog_menu > ul > li.active > a{
    color: var(--main_color);
}
/*--------- header css end -------------*/
@media(max-width:576px){
   .rcs_blog_header .row {
      flex-direction: column;
   }
   .rcs_blog_header .row .col-lg-9,.rcs_blog_header .row .col-lg-3 {
      flex: 0 0 100%;
      max-width: 100%;
   }
   .rcs_blog_menu {
      justify-content: center;
   }
   .rcs_blog_logo {
      text-align: center;
   }
}
@media(max-width:450px){
   
}
</style>
<body>
   <!-- header start -->
   <div class="rcs_blog_header">
      <div class="container">
         <div class="row">
            <div class="col-lg-3">
               <div class="rcs_blog_logo">
                  <a href="javascript:;"><img src="assets/images/pushbutton_logo.png" alt="logo"></a>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="rcs_blog_menu">
                  <ul>
                     <li><a href="https://pushbutton-vip.com/privacy-policy">Privacy Policy</a></li>
                     <li class="active"><a href="javascript:;">Terms and Conditions</a></li>
                  </ul>
                  <a href="https://pushbutton-vip.com/authentication" class="rcs_btn" target="_blank">Login</a>
                  <div class="rcs_menu_toggle"><span></span><span></span><span></span></div>
                  <div class="rcs_menu_overlay"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header end -->
   <div class="rcs_policy_box">
      <div class="rcs_policy_body">
         <h5>Terms and Conditions</h5>
         <p>Welcome to Push Buttons!</p> 
         <p>These terms and conditions outline the rules and regulations for the use of Push Buttons's Website, located at https://pushbutton-vip.com/.</p> 
         <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Push Buttons if you do not agree to take all of the terms and conditions stated on this page.</p>
         <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
         <h5>Cookies</h5>
         <p>We employ the use of cookies. By accessing Push Buttons, you agreed to use cookies in agreement with the Push Buttons's Privacy Policy.</p>
         <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
         <h5>License</h5>
         <p>Unless otherwise stated, Push Buttons and/or its licensors own the intellectual property rights for all material on Push Buttons. All intellectual property rights are reserved. You may access this from Push Buttons for your own personal use subjected to restrictions set in these terms and conditions.</p>
         <p>You must not:</p>
         <p>•	Republish material from Push Buttonsp</p>
         <p>•	Sell, rent or sub-license material from Push Buttons</p>
         <p>•	Reproduce, duplicate or copy material from Push Buttons</p>
         <p>•	Redistribute content from Push Buttons</p>
         <p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the Terms And Conditions Generator and the Privacy Policy Generator.</p>
         <p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Push Buttons does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Push Buttons,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Push Buttons shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
         <p>Push Buttons reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
         <p>You warrant and represent that:</p>
         <p>•	You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</p>
         <p>•	The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</p>
         <p>•	The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</p>
         <p>•	The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</p>
         <p>You hereby grant Push Buttons a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
         <h5>Hyperlinking to our Content</h5>
         <p>The following organizations may link to our Website without prior written approval:</p>
         <p>•	Government agencies;</p>
         <p>•	Search engines;</p>
         <p>•	News organizations;</p>
         <p>•	Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</p>
         <p>•	System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</p>
         <p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>
         <p>We may consider and approve other link requests from the following types of organizations:</p>
         <p>•	commonly-known consumer and/or business information sources;</p>
         <p>•	dot.com community sites;</p>
         <p>•	associations or other groups representing charities;</p>
         <p>•	online directory distributors;</p>
         <p>•	internet portals;</p>
         <p>•	accounting, law and consulting firms; and</p>
         <p>•	educational institutions and trade associations.</p>
         <p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Push Buttons; and (d) the link is in the context of general resource information.</p>
         <p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>
         <p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Push Buttons. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>
         <p>Approved organizations may hyperlink to our Website as follows:</p>
         <p>•	By use of our corporate name; or</p>
         <p>•	By use of the uniform resource locator being linked to; or</p>
         <p>•	By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</p>
         <p>No use of Push Buttons's logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
         <h5>iFrames</h5>
         <p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>
         <h5>Content Liability</h5>
         <p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
         <h5>Your Privacy</h5>
         <p>Please read Privacy Policy</p>
         <h5>Reservation of Rights</h5>
         <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
         <h5>
         Removal of links from our website</h5>
         <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
         <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
         <h5>Disclaimer</h5>
         <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
         <p>•	limit or exclude our or your liability for death or personal injury;</p>
         <p>•	limit or exclude our or your liability for fraud or fraudulent misrepresentation;</p>
         <p>•	limit any of our or your liabilities in any way that is not permitted under applicable law; or</p>
         <p>•	exclude any of our or your liabilities that may not be excluded under applicable law.</p>
         <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
         <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
      </div>
   </div>
</body>
</html>