<?php require 'views/layouts/header.php'; ?>
<?php require 'views/layouts/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-8">
            <div class="text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($this->users as $user) { ?>
                        <tr>
                            <td><?php echo $user[0] ?></td>
                            <td><?php echo $user[1] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<script>

let path = window.location.origin + window.location.pathname;

const getData = async() => {
    try {
        const respuesta = await fetch(`${path}/colors`);

        // Si la respuesta es correcta
        if (respuesta.status === 200) {

            const datos = await respuesta.json();
            console.log(datos.Azul);

            /**CHART */
            const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rojo', 'Azul', 'Amarillo', 'Verde', 'Morado', 'Naranja'],
            datasets: [{
                label: '',
                data: [datos.Rojo, datos.Azul, datos.Amarillo, datos.Verde, datos.Morado, datos.Naranja],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
        } else {
            console.log('Error');
        }

    } catch (error) {
        console.log(error);
    }

}

getData();











    
</script>

<?php require 'views/layouts/footer.php'; ?>