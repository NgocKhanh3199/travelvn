<div class="container m-5 p-5">
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#online">Thanh toán online</button>
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#offline">Thanh toán trực tiếp</button>
</div>

<div class="modal fade" id="online" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span>Thanh toán trực tuyến</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="total-price">
                    <p class="total">Mã đơn hàng</p>
                    <p class="thucte price-total fw-bold" id="price-total">#10005756</p>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="button">Tài khoản ngân hàng</button>
                    <button class="btn btn-primary" type="button">Visa</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="offline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span>Thanh Toán</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="total-price">
                    <p class="total">Thành Tiền</p>
                    <p class="thucte price-total fw-bold" id="price-total">1.000.000VNĐ</p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tiền khách đưa</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tiền thừa</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="button">Thanh Toán</button>
                    <button class="btn btn-primary" type="button">Huỷ</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nhập số tài khoản</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Chọn ngân hàng</option>
                    <option value="1">Vietcombank</option>
                    <option value="2">Agribank/option>
                    <option value="3">Sacombank</option>
                </select>