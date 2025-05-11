<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1050;
    }

    .modal-dialog {
        max-width: 500px;
        margin: 30px auto;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .modal-header {
        background-color: #13639E;
        color: white;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .modal-header .close {
        color: white;
        font-size: 20px;
        /* font-weight: bold; */
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        padding: 10px;
        text-align: right;
    }

    .modal-footer .btn {
        padding: 8px 15px;
        font-size: 16px;
    }
</style>
