<h3>Создать контракт</h3>
<form action="" method="post">
    <div class="row mb-2">
        <h5>Клиент</h5>
        <div class="col">
            <label for="client_surname" class="form-label">Фамилия</label>
            <input id="client_surname" name="client_surname" value="" type="text" class="form-control">
        </div>
        <div class="col">
            <label for="client_name" class="form-label">Имя</label>
            <input id="client_name" name="client_name" value="" type="text" class="form-control">
        </div>
        <div class="col">
            <label for="client_patronymic" class="form-label">Отчество</label>
            <input id="client_patronymic" name="client_patronymic" value="" type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <h5>Менеджер</h5>
        <div class="col">
            <label for="employee_surname" class="form-label">Фамилия</label>
            <input id="employee_surname" name="employee_surname" value="" type="text" class="form-control">
        </div>
        <div class="col">
            <label for="employee_name" class="form-label">Имя</label>
            <input id="employee_name" name="employee_name" value="" type="text" class="form-control">
        </div>
        <div class="col">
            <label for="employee_patronymic" class="form-label">Отчество</label>
            <input id="employee_patronymic" name="employee_patronymic" value="" type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <label for="number_contract" class="form-label">Номер контракта</label>
            <input id="number_contract" name="number_contract" value="" type="text" class="form-control">
        </div>
        <div class="col">
            <label for="price_contract" class="form-label">Цена</label>
            <input id="price_contract" name="price_contract" value="" type="text" class="form-control">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <label for="product_id" class="form-label">Товары</label>
            <select id="product_id" name="product_id" class="form-select">
                <option value="0" selected></option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col">
            <label for="delivery_time" class="form-label">Срок (период) поставки</label>
            <input id="datepicker" name="delivery_time" value="" type="text" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label for="comment" class="form-label">Комментарий</label>
        <textarea id="comment" name="comment" class="form-control" rows="2"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Создать</button>
</form>