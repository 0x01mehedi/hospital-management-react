<!-- <form action="{{url('/users/1')}}" method='post'> -->
<form action="{{route('users.update',1)}}" method='post'>
  @csrf  
  @method('PUT')  
  <input type="text" name="name" value="Jahid" />  
 <input type='submit' value='Update' />
</form>