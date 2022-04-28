<!DOCTYPE html>
<html>
<head>
    <title>For Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>For Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('product/create') ?>"> Create New Product</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Title</th>
          
          <th width="220px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $product) { ?>      
      <tr>
          <td><?php echo $product->product_name; ?></td>
          
      <td>
        <form method="DELETE" action="<?php echo base_url('product/delete/'.$product->product_id);?>">
          <a class="btn btn-info" href="<?php echo base_url('product/'.$product->product_id) ?>"> show</a>
         <a class="btn btn-primary" href="<?php echo base_url('product/edit/'.$product->product_id) ?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>
</div>
 </body>
</html>