<script>
    $(function () {
        $().Pagination({
            pages_wrap: "pages_wrap",
            container: "main_data",
            par_page: 20,
            num_pages: '<? echo ceil(47 / 20)?>', //count select result
            path_data: '<? echo json_encode(
                array("DataBase" => "/var/www/7zap/cats/honda/system/libs",
                    "DModel" => "/var/www/7zap/cats/honda/system/libs",
                    "CarsModel" => "/var/www/7zap/cats/honda/models"
                ))?>',
            obj_params: '<? echo json_encode(array("obj" => "CarsModel", "method" => "getCarsList"))?>',
            view_params: ['cmodnamepc']
        });
    });
</script>