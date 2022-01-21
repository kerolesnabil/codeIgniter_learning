




<h1>{title}</h1>
<p>{content}</p>
{items}
<form>
    <thead>

    <th>title</th>
    <th>content</th>

    </thead>
    <tbody>
        {users}
            <tr>
                <td>{id}</td>
                <td>{user_name}</td>
                <td>{country}</td>
                <td>{mail}</td>
            </tr>
        {/users}
    </tbody>
</form>


{/items}