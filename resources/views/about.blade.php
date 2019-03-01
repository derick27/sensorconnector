<html>
<head>
<title>Clients</title>
</head>
<body>
<table border = "1">
<tr>
<td>ClientId</td>
<td>Nom</td>
<td>Adresse</td>
<td>Email</td>
<td>Phone</td>
</tr>
@foreach ($clients as $client)
<tr>
<td>{{ $client->clientId }}</td>
<td>{{ $client->nom }}</td>
<td>{{ $client->addresse }}</td>
<td>{{ $client->courriel }}</td>
<td>{{ $client->telephone }}</td>
</tr>
@endforeach
</table>
</body>
</html>