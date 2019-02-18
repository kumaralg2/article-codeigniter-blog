<?php include('header.php')?>
<body>
    <h1>Articles List</h1>
   <div class="container">
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Article Title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
<?php if(count($articles)):?>
<?php foreach($articles as $art):?>
    <tr class="table-active">
      <th scope="row">1</th>
      <td><?= $art->article_title; ?> </td>
      <td><a href="http://" target="_blank" rel="noopener noreferrer">Edit</a></td>
      <td><a href="http://" target="_blank" rel="noopener noreferrer">Delete</a></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="3">
            No data avialable
        </td>
    </tr>
<?php endif; ?>

  </tbody>
</table>
   </div>
<?php include('footer.php')?>
