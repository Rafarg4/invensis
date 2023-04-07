<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tablse">
        <thead>
        <tr>
            <th>Usuario</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Creado</th>
        
        </tr>
        </thead>
        <tbody>
    
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{implode(" ",$user->getRoleNames()->toArray())}}</td>
            <td>{{ $user->created_at }}</td>
           
            </tr>
        </tbody>
    </table>
</div>


