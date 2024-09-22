import React from "react";
import { useForm } from "@inertiajs/inertia-react";

const Edit = (props) => {
    const { category } = props;
    const { data, setData, put, errors } = useForm({
        name: category.name || "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/categories/${category.id}`);
    };

    return (
        <div className="px-36 py-36">
            <h1 className="text-2xl font-bold">Edit Category</h1>
            <form onSubmit={handleSubmit} className="flex gap-6">
                <label className="form-control w-full max-w-xs">
                    <div className="label">
                        <span className="label-text">Name</span>
                    </div>
                    <input
                        type="text"
                        placeholder="Name"
                        className="input input-bordered input-primary w-full max-w-xs"
                        value={data.name}
                        onChange={(e) => setData("name", e.target.value)}
                    />
                    {errors.name && <div>{errors.name}</div>}
                </label>

                <button type="submit" className="btn btn-primary mt-8">
                    Save
                </button>
            </form>
        </div>
    );
};

export default Edit;
