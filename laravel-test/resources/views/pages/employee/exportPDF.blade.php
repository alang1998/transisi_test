<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
            /* http://meyerweb.com/eric/tools/css/reset/ 
                v2.0 | 20110126
                License: none (public domain)
            */

            html, body, div, span, applet, object, iframe,
            h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            a, abbr, acronym, address, big, cite, code,
            del, dfn, em, img, ins, kbd, q, s, samp,
            small, strike, strong, sub, sup, tt, var,
            b, u, i, center,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, embed, 
            figure, figcaption, footer, header, hgroup, 
            menu, nav, output, ruby, section, summary,
            time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }
            /* HTML5 display-role reset for older browsers */
            article, aside, details, figcaption, figure, 
            footer, header, hgroup, menu, nav, section {
                display: block;
            }
            body {
                line-height: 1;
                margin: 0 50px;
            }
            ol, ul {
                list-style: none;
            }
            blockquote, q {
                quotes: none;
            }
            blockquote:before, blockquote:after,
            q:before, q:after {
                content: '';
                content: none;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
                margin: 0 auto;
                width: 100%;
            }
            
            tr td {
                border: 1px solid black;
                padding: 10px 15px;
            }

            td:first-child {
                text-align: center;
                width: 5%;
            }

            .header {
                text-align: center;
                padding: 10px;
                border-bottom: 2px solid black;
                margin: 10px 0px;
                font-size: 10px;
                font-weight: bold;
            }

            .sub-header {
                margin-top: 10px;
                font-weight: 500;
                color: #888;
            }

            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.1em;
            }
    </style>
</head>
<body>
    @foreach ($companies as $company)
        <div class="header">
            <h1>{{ $company->name }}</h1>
            <div class="sub-header">
                <h2  style="float: left; width: 50%;">{{ $company->email }}</h2>
                <h2 style="margin-left: 50%; width: 50%;">{{ $company->website }}</h2>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($company->employee as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>