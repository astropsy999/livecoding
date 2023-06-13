<?php $this->view('admin/admin-header', $data);?>
<?php if($action == 'add'):?>
  <div class="card col-md-6 mx-auto">
            <div class="card-body">
              <h5 class="card-title">Новий курс</h5>

              <!-- No Labels Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Назва курсу">
                </div>
                <div class="col-md-12">
                  <select id="inputState" class="form-select">
                    <option value=""selected="">Категорія курсу...</option>
                    <?php if(!empty($categories)):?>
                      <?php foreach($categories as $cat):?>
                        <option value="<?=esc($cat->id)?>"><?=esc($cat->category)?></option>
                      <?php endforeach;?>
                    <?php endif;?>
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Зберегти</button>
                <a href="<?=ROOT?>/admin/courses">
                  <button type="button" class="btn btn-secondary">Скасувати</button>
                </a>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div>
<?php elseif($action == 'edit'):?>
<?php else:?>
<div class="pagetitle d-flex flex-row align-center justify-content-between">
              <h1>Мої курси</h1>
              <a href="<?=ROOT?>/admin/courses/add">
                <button class="btn btn-info ml-2"><i class="bi bi-journal-plus"></i> Додати курс</button>
              </a>
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
                    <th scope="col">Дія</th>
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
                    <td><i class="bi bi-pencil-square"></i> <i class="bi bi-trash"></i></td>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
<?php endif;?>
<?php $this->view('admin/admin-footer', $data);?>