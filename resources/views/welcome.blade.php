@extends('layouts.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div id ='app'>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
   Inventory
  </a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add Item</button>

<div class="modal" tabindex="-1" id="exampleModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="name" v-model='new_task.name'>Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="name" v-model='new_task.quantity'>Quantity</label>
    <input type="number" class="form-control" name="quantity">
  </div>
  <div class="form-group" >
  <label for="sel1" v-model='new_task.quantity'>Category</label>
  <select class="form-control" id="sel1" name="category">
    <option class="dropdown-item" href="#">Equipment</option>
    <option class="dropdown-item" href="#">Utensils</option>
  </select>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" v-on:click='postNewTask'>Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</nav>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tr v-for = "task in tasks">
    <td>
    @{{task.id}}
  </td>
  <td>
    @{{task.name}}
  </td>
    <td>
    @{{task.quantity}}
  </td>
    <td>
    @{{task.name}}
  </td>
    <td>
      <button type="button" class="btn btn-primary" >Edit</button>
    </td>
  </tr>
</table>
</div>
</div>
</div>
 </div>
@endsection

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script type="text/javascript">
       var tasks = @json($tasks);    
    
  </script>
  <script>
       var vm = new Vue({
      el:'#app',
      data:{
        tasks: tasks,
        new_task: {
          id: 1,
          name:'',
          quantity:1,
          category:'',
        }
      },
        methods: {
        postNewTask() {
          axios.post('/inventory'+this.new_task)
            .then(({data})=>{
              this.tasks.push(data);
              this.new_task.name = '';
              this.new_task.category = '';
              console.log(data);
            });
        }
      }
    });
  </script>