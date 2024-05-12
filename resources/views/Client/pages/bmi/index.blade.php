@extends('client.master')

@section('title', 'Bmi')

@push('css')
    <style>
        .containerr {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            margin: 100px 200px;
            padding: 10px;
            border: 5px solid #dee2e6;
            border-radius: .25rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .075);
        }

        .rowr {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            width: 900px;

        }

        .containerr h3 {
            font-size: 80px;
            color: #f15d44;
            font-family: 'Poppins', sans-serif;
            margin: 100px 50px;
        }

        .css {
            width: 70px;
        }

        .row span {
            font-weight: 500;
        }

        input[type="range"] {
            width: 70%;
            height: 3.5px;
            -webkit-appearance: none;
            appearance: none;
            background-color: #dcdcdc;
            border-radius: 3px;
            outline: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            height: 15px;
            width: 15px;
            background-color: #1c1c1c;
            border-radius: 50%;
            cursor: pointer;
        }

        #result {
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 1px;
            text-align: center;
            color: #0be881;
        }

        #category {
            font-size: 18px;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 50px;
        }
    </style>
@endpush
@section('content')
    <div class="containerr">
        <h3>BMI CALCULATOR</h3>
        <div class="rowr">
            <span class="css">Weight</span>
            <input type="range" min="20" max="200" value="20" id="weight" oninput="calculate()">
            <span id="weight-val">20 kg</span>
        </div>
        <div class="rowr">
            <span class="css">Height</span>
            <input type="range" min="100" max="250" value="100" id="height" oninput="calculate()">
            <span id="height-val">100 cm</span>
        </div>

        <p id="result">20.0</p>
        <p id="category">Normal weight</p>
    </div>
@endsection

@push('js')
    <script>
        function calculate() {
            let bmi;
            let result = document.getElementById("result");

            let weight = parseInt(document.getElementById("weight").value);
            document.getElementById("weight-val").textContent = weight + " kg";

            let height = parseInt(document.getElementById("height").value);
            document.getElementById("height-val").textContent = height + " cm";

            bmi = (weight / Math.pow((height / 100), 2)).toFixed(1);
            result.textContent = bmi;

            if (bmi < 18.5) {
                category = "Underweight";
                result.style.color = "#ffc44d";
            } else if (bmi >= 18.5 && bmi <= 24.9) {
                category = "Normal Weight";
                result.style.color = "#0be881";
            } else if (bmi >= 25 && bmi <= 29.9) {
                category = "Overweight";
                result.style.color = "#ff884d";
            } else {
                category = "Obese";
                result.style.color = "#ff5e57";
            }
            document.getElementById("category").textContent = category;
        }
    </script>
@endpush
