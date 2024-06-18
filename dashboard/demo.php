<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .sidenav {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #333;
      padding-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 18px;
      color: #f2f2f2;
      display: block;
    }
    .sidenav img {
      width: 60%;
      height: 20%;
      display: block;
      margin: 0 auto 20px;
      border-radius: 80%;
      overflow: hidden; 
    }

    .sidenav a:hover {
      color: #c0c0c0;
    }

    .main {
      margin-left: 250px;
      padding: 20px;
      flex: 1;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: right;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.logout {
      float: right;
      width: 50px;
      background-color: #f44336;
      color: white;
    }

    .topnav a.logout:hover {
      background-color: #b71c1c;
    }

    .topnav h2
    {
      text-align: right;
      margin-left: 270px;
      color: #f2f2f2;
    }

    .topnav h2, a
    {
      display: inline-block;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .table-container {
      margin-top: 20px;
      border: 2px solid black;
      margin-bottom: 40px;
    }

    .table-header {
      background-color: #333;
      color: white;
      padding: 10px;
      font-weight: bold;
    }

    .table-content {
      padding: 10px;
    }

    .sidenav h3
    {
      margin-left: 30px;
      margin-top: -18px;
      color: #f2f2f2;
    }

  </style>
</head>
<body>

<div class="topnav">
  <h2> Society Management System </h2>
  <a href="#" class="logout" onclick="logout()">Logout</a>
  <a href="/Society_Management/dashboard/services.php">Services</a>
  <a href="/Society_Management/dashboard/contact_us.php">Contact Us</a>
  <a href="/Society_Management/dashboard/about_us.php">About Us</a>
</div>

<div class="sidenav">
  <img src="/Society_Management/images/user_default.png" alt="Society Logo">
  <h3> Name </h3>
  <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Home</a>
  <a href="/Society_Management/dashboard/profile.php">Profile</a>
  <a href="/Society_Management/dashboard/about_society.php">About Society</a>
  <a href="/Society_Management/dashboard/funds.php">Funds</a>
  <a href="/Society_Management/dashboard/notices.php">Notice</a>
  <a href="/Society_Management/dashboard/authentication.php">Authentications</a>
  <a href="#">Upload Documents</a>
  <a href="/Society_Management/dashboard/bills.php">Bills</a>
  <a href="/Society_Management/dashboard/expenditures.php">Expenditures</a>
  <a href="/Society_Management/dashboard/gathering.php">Gatherings</a>
  <a href="/Society_Management/dashboard/complaints.php">Complaints</a>
</div>

<div class="main">

  <div class="table-container">
    <div class="table-header">Announcements</div>
    <div class="table-content">
      <strong> Announcement section </strong>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto vitae quas ex? Ut hic sed accusamus dignissimos qui iste quo, natus officiis, consectetur ipsum nobis itaque totam nostrum. Nemo cumque deleniti quis nisi nesciunt pariatur quidem voluptatem tenetur dolor minus ullam sed magnam numquam odio possimus, dolores odit facere sapiente velit vitae libero temporibus provident. Provident corrupti autem ullam tenetur cupiditate laboriosam alias nulla ipsum beatae repudiandae. Deleniti sequi sunt repellendus mollitia nulla et amet nobis, explicabo debitis eligendi itaque officiis incidunt natus? Placeat nisi illum nobis labore! Repellendus similique iusto perspiciatis dicta placeat tenetur nihil ea sed eum.
    </div>
  </div>

  <div class="table-container">
    <div class="table-header">Notifications</div>
    <div class="table-content">
      <Strong>Notifications will lie here </strong>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam esse nemo accusamus voluptates nesciunt aliquam qui sit alias exercitationem tempore, earum fugit iure laborum ad? Cupiditate aliquam exercitationem voluptatem itaque! Fugiat, sapiente laboriosam explicabo labore incidunt repellat obcaecati blanditiis laborum nihil maxime recusandae modi et nam quo sint! A vitae accusamus magni nesciunt voluptates facilis amet? Aliquam numquam aliquid nesciunt a. Excepturi, nisi perspiciatis impedit reiciendis sunt laboriosam eum, laborum autem minima placeat suscipit eaque culpa qui ut quisquam? Illum harum fuga optio soluta dolorem adipisci placeat fugiat molestias? Minus nisi mollitia illum, amet ipsa sit quia quidem libero dolor aliquid iure placeat alias cumque, ipsam voluptatibus incidunt, repudiandae itaque repellendus cum ipsum delectus nemo totam facere sapiente. Numquam, repudiandae tempore iusto praesentium inventore culpa temporibus enim cum debitis, officiis animi labore sed, a doloribus consequuntur assumenda quam id dolorum illo suscipit nihil nostrum quo? Rem quibusdam nam sapiente, amet iste non consectetur harum deserunt laudantium corporis ea libero nemo dolorum maxime delectus reprehenderit laboriosam voluptatem similique necessitatibus est quas maiores? Maiores explicabo veritatis quam nobis provident at distinctio ipsa cupiditate iusto blanditiis ex accusantium ratione illo repellat, magnam architecto error debitis amet quia optio voluptatibus, mollitia esse tempore doloremque.
    </div>
  </div>

  <div class="table-container">
    <div class="table-header">Recent Activities</div>
    <div class="table-content">
      <strong> Recent Activities Section </strong>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ad hic debitis officiis quia molestiae inventore. Atque saepe architecto error dignissimos amet ea, nostrum exercitationem quisquam, accusantium ad repellendus perferendis itaque nulla corrupti dolores quasi dicta et omnis fugiat praesentium? Cum ex quas cupiditate labore rem quidem voluptatum? Quos non quia fuga maxime facere sunt, doloribus voluptas aliquam repellat reiciendis pariatur unde expedita! Ab modi accusantium tempore repellendus eaque perferendis architecto dolores odit cum consequuntur magni voluptate et non, illo reprehenderit ratione voluptatibus sint? Cumque autem assumenda deleniti reiciendis magni! Eveniet ducimus at quis maxime id, reprehenderit alias nobis nesciunt laboriosam neque quasi molestias magnam repudiandae? Qui cupiditate, laborum in tenetur sit amet? Repellendus repudiandae asperiores cupiditate ipsam magni tempora voluptatem quod sequi! Recusandae magnam consequuntur numquam quaerat sunt tempore autem, illo perspiciatis excepturi impedit laudantium delectus dolor voluptate minus cum, placeat commodi ea animi id molestiae! Error exercitationem obcaecati unde aperiam repudiandae, harum est delectus labore numquam officiis autem quidem sapiente quod consequatur ipsum, asperiores ducimus aliquid reprehenderit reiciendis iste perferendis odit totam voluptatum! Optio repudiandae minus unde repellendus id debitis exercitationem, cum, impedit eum iure voluptatum aut aspernatur eius, quae laboriosam fuga ipsa asperiores at perferendis numquam blanditiis obcaecati. Atque nulla quia, mollitia cupiditate, placeat dolor deserunt, quasi ratione at saepe necessitatibus quae? Maxime tenetur dolore, veritatis molestias commodi vitae nulla inventore? Aperiam fugiat similique quos deserunt debitis placeat qui eum, voluptatum labore nihil suscipit enim, accusantium magnam vel culpa perferendis! Ratione accusantium ipsa eos earum quibusdam. Ut voluptatum nostrum quaerat dignissimos delectus exercitationem laudantium ipsa, illo, commodi ab sunt ex laboriosam esse, consequatur qui facere! Voluptatem voluptatibus nihil optio dignissimos sed nostrum tempora minima eligendi magni praesentium excepturi repellat pariatur similique ducimus quod voluptas vero, harum odio at fugiat, rem natus recusandae! Incidunt, exercitationem! Corporis, numquam deserunt nemo fugit odio totam sunt. Eius aspernatur nihil nobis sequi soluta deleniti, qui ipsum repellendus, vel fugiat cumque, dignissimos nesciunt officiis delectus commodi in veniam esse officia exercitationem possimus minima? Officiis fuga pariatur harum facere, maiores porro officia veniam provident in voluptatum sapiente autem corporis sequi aperiam rem perferendis dolores placeat tempore delectus repudiandae cum nesciunt repellat dolorum! Debitis ad labore sunt quasi optio, eveniet accusantium quae reiciendis ab temporibus, nobis dolore illo quas, corrupti repudiandae aperiam facere distinctio omnis laborum consectetur velit impedit. Fugiat optio porro maiores inventore saepe, dolore nesciunt quia? Quae assumenda facere nesciunt neque maiores amet illum blanditiis repellat recusandae odit, maxime impedit laudantium obcaecati corrupti culpa rem consectetur nulla debitis. A ex odio qui ratione temporibus provident tenetur enim, dignissimos aspernatur facere molestiae omnis hic pariatur, cupiditate quisquam harum cum perferendis! Molestias sunt temporibus quisquam exercitationem voluptate delectus illo ea, laboriosam distinctio harum laborum, et voluptatem adipisci corporis praesentium dicta iusto voluptates! Perferendis nobis ea fugit dolores culpa quisquam earum maxime, sit quis, praesentium itaque error in modi quae omnis. Incidunt ratione error quibusdam cum eaque officia placeat explicabo neque cumque, illo quam ipsam repellat aut. Deserunt illum provident sit! Explicabo nesciunt qui nam ratione quo ullam velit. Nesciunt reiciendis atque numquam consectetur commodi sapiente laudantium hic dolor cum quod error quos quis ipsa maiores a unde deserunt molestiae veritatis blanditiis, nisi dolorum libero, possimus velit aut! Vel ipsa impedit et magnam atque, blanditiis eligendi mollitia quas amet corrupti excepturi tempora cum expedita maxime, pariatur ab harum architecto vitae modi itaque nam illum exercitationem reprehenderit! Similique adipisci provident expedita culpa, delectus excepturi sunt nam ipsam modi accusamus. Ipsa in debitis iure, corporis inventore beatae placeat, deleniti laudantium unde atque labore ad? Odit unde repellendus facere exercitationem omnis ipsa et ducimus, blanditiis, quia nostrum ad voluptates odio debitis placeat error? Itaque quae deserunt quas ex corporis voluptatem odio quam sequi modi tenetur vero pariatur rem qui aliquid velit soluta distinctio consequatur in, libero neque fugiat cumque assumenda ullam. Quasi minima architecto expedita iste minus sequi! Deleniti quasi, repellat iure ratione earum maiores tempora sint molestias velit fugit architecto dolor nemo pariatur, reprehenderit voluptatum autem consequuntur? Animi aspernatur labore possimus earum omnis officiis voluptatem, fugiat ipsam, maxime, repudiandae blanditiis? Officia, magnam impedit voluptates vero sed vel dicta numquam odio animi, ab pariatur nam tempore fuga tenetur praesentium laudantium excepturi veritatis asperiores facilis unde quasi. Impedit omnis ex minus quis veniam totam quia itaque eius corrupti iure. Maiores ullam laborum, tempora, debitis commodi sed odit qui temporibus sunt dignissimos nesciunt enim autem voluptatibus saepe facilis eius deleniti! Neque beatae veniam nisi quam sint obcaecati aliquam tempore molestias? Non et aut magnam reiciendis aperiam dolor! Debitis neque tempore harum blanditiis tempora corporis. Hic perspiciatis ipsam tempora recusandae, dolorum delectus, praesentium explicabo cum aliquam odio iusto quod dolorem blanditiis tempore ratione commodi enim impedit? Iure suscipit exercitationem atque veniam est beatae, voluptatem maiores non excepturi at eius soluta, reiciendis ipsam molestiae eligendi quibusdam cupiditate odit ratione. Natus architecto dolorum unde repudiandae totam tempore commodi sunt laudantium? Similique ea iusto, dolor hic eaque est aut ipsam nihil ratione perferendis, quas voluptate asperiores culpa quia. Explicabo, ex sunt, molestias neque aspernatur non, dignissimos porro nisi est nihil iste consectetur unde necessitatibus nam praesentium quo voluptatem. Ut facilis deleniti repudiandae necessitatibus amet temporibus! Cupiditate soluta beatae, velit qui et non corporis exercitationem aliquid dolore sequi unde quae laboriosam ullam facilis ipsam cum veniam eaque? Libero totam blanditiis debitis tempore cumque enim aspernatur nulla quasi commodi delectus, veritatis alias a numquam vel voluptatem impedit modi amet est animi fugiat saepe. Cum unde, hic reiciendis, harum rem nostrum voluptates assumenda quod omnis inventore reprehenderit vero iusto molestiae adipisci? Repellendus est quidem, praesentium quam nulla fugiat adipisci quia, quas consectetur quos temporibus veniam! Quia expedita maxime numquam soluta minus quo magnam neque officiis? Totam rerum inventore deserunt tenetur. Fugit harum laboriosam delectus inventore, iste odit fuga quia magni ratione eaque cumque voluptates labore magnam deserunt ducimus aliquid ipsam exercitationem necessitatibus saepe tempora aspernatur. Sed, error at minus veritatis quas repudiandae illo recusandae harum doloribus dolores quae, alias sint ducimus. Perferendis molestiae veritatis debitis qui, quasi ducimus earum minus, sapiente placeat reiciendis alias. Eos maxime quo pariatur?
    </div>
  </div>  
</div>

<footer>
  &copy; 2024 Society Management System. All rights reserved.
</footer>

</body>
</html>
