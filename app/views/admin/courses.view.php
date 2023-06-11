<?php $this->view('admin/admin-header', $data);?>
<div class="pagetitle d-flex flex-row align-center justify-content-between">
              <h1>Мої курси</h1>
              <button class="btn btn-info ml-2"><i class="bi bi-journal-plus"></i> Додати курс</button>
              </div>
<div class="card">

            <div class="card-body">


              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Категорія</th>
                    <th scope="col">Ціна</th>
                    <th scope="col">Основна тема</th>
                    <th scope="col">Дата</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
                    <td>2016-05-25</td>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
<?php $this->view('admin/admin-footer', $data);?>