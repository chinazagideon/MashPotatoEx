@extends('appV2.layouts.app')
@section('content')

    <div class="container">
        <div id="app">

            <example-component>
            </example-component>
            <input type="text" v-model="message">
            <p>The value of the input is: @{{ message }}</p>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
{{--                <tr v-for="(user, index) in users" :key="user.id">--}}
{{--                    <td>@{{ index + 1 }}</td>--}}
{{--                    <td>@{{ user.name }}</td>--}}
{{--                    <td>@{{ user.email }}</td>--}}
{{--                    <td>@{{ user.updated_at }}</td>--}}
{{--                    <td>@{{ user.created_at }}</td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('page_css')
    {{--<script src="/webpack.mix.js"></script>--}}
    {{--    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>--}}

    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection


@section('page_js')
    <script>

        new Vue({
            el: '#app',
            data() {
                return {
                    users: [],
                    message: "Hello world",
                    timer: '',
                }
            },
            mounted: function () {
                // this.fetchUsers()
                // this.timer = setInterval(this.fetchUsers, 5000);
            },
            methods: {
                fetchUsers: function() {
                    axios.get("https://plisio.net/api/v1/invoices/new?source_currency=USD"+
                        "&source_amount=200"+
                        "&order_number=2w43332342"+
                        "&currency=BTC"+
                        "&email=support@pennhaven.co"+
                        "&order_name=demobtc13"+
                        "&callback_url=https://pennhaven.co/callback"+
                        "&api_key=GPT8l2cftfW1EZF3QHYGfM_-5CJybdSsUziFGnXDaqGp7W8BOQBQ8UvlYsiX-YWj")
                        .then(response => (
                            console.log(response)
                            // this.users = response.data.data
                        ))
                        .catch(error => {
                            console.log("Error", error)
                        });
                    setInterval(this.mounted, 4000);
                }
            }
        });

    </script>
@endsection
