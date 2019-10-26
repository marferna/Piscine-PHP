function get_cookie()
{
	var split = document.cookie.split(';');
	var data = [];
	split.forEach(function (cookie)
	{
		data.push(cookie.trim());
	});
	delete split;
	var ret = [];
	for (var cookie in data)
	{
		if (!data[cookie])
			continue;
		split = data[cookie].split('=');
		ret[parseInt(split[0])] = split[1];
	}
	return (ret);
}
function create_cookie(id, name)
{
	document.cookie = id + "=" + name;
}
function delete_cookie(id)
{
	var date = new Date(0);
	document.cookie = id + "=;expires=" + date.toUTCString();
}

var size = 0;
var list = document.getElementById("ft_list");
var cookie = get_cookie();
for (let id in cookie)
{
	create_todo(id, cookie[id]);
	size++;
}
function create_todo(id, name)
{
	var div = document.createElement("div");
	div.id = id;
	div.innerText = name;
	div.onclick = function () {delete_todo(id);};
	list.prepend(div);
}
function add_todo()
{
	var addtodo = prompt("Nouveau to do");
	if (!addtodo)
		return;
	create_todo(size, addtodo);
	create_cookie(size, addtodo);
	size++;
}
function delete_todo(id)
{
	var todo = document.getElementById(id);
	if (confirm("Supprimer le to do " + todo.innerText + " ?"))
	{
		delete_cookie(id);
		list.removeChild(todo);
		size--;
	}
}
