<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
    <div>
        <span>Front end</span>
        <table style="border: 1px solid black">
            <tr>
                <td>uid</td>
                <td>first name</td>
                <td>last name</td>
                <td>mobile</td>
                <td>email</td>
            </tr>

            <tbody id="front-end">

            </tbody>
        </table>
    </div>

    <br>

    <div>
        <span>Back end</span>
        <table style="border: 1px solid black;">
            <tr>
                <td>uid</td>
                <td>first name</td>
                <td>last name</td>
                <td>mobile</td>
                <td>email</td>
            </tr>

            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data['uid'] }}</td>
                    <td>{{ $data['first_name'] }}</td>
                    <td>{{ $data['last_name'] }}</td>
                    <td>{{ $data['mobile'] }}</td>
                    <td>{{ $data['email'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const container = document.querySelector('#front-end');
        const employees = [];

        axios
            .post('https://ignite-careers.com/test/endpoint.php', {
                jobId: 10
            }, {
                headers: { Authorization: `Bearer qwertyuiop` }
            })
            .then(({data}) => {
                console.log(data);
                employees.push(...data.data)

               container.innerHTML = employees.map(v => {
                    return `
                    <tr>
                        <td>${v.uid}</td>
                        <td>${v.first_name}</td>
                        <td>${v.last_name}</td>
                        <td>${v.mobile}</td>
                        <td>${v.email}</td>
                    </tr>
                    `
                }).join('')
            });


    </script>
</body>

</html>