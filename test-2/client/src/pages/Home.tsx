import { useEffect, useState } from "react";
import axios from "axios";

interface Item {
  id: number;
  name: string;
  description: string;
}

export default function Home() {
  const [items, setItems] = useState<Item[]>([]);
  const [form, setForm] = useState({ name: "", description: "" });
  const [editingId, setEditingId] = useState<number | null>(null);

  const fetchItems = async () => {
    const res = await axios.get("http://localhost:3000/api/items");
    setItems(res.data);
  };

  useEffect(() => {
    fetchItems();
  }, []);

  const handleSubmit = async () => {
    if (editingId !== null) {
      await axios.put(`http://localhost:3000/api/items/${editingId}`, form);
      setEditingId(null);
    } else {
      await axios.post("http://localhost:3000/api/items", form);
    }
    setForm({ name: "", description: "" });
    fetchItems();
  };

  const handleDelete = async (id: number) => {
    await axios.delete(`http://localhost:3000/api/items/${id}`);
    fetchItems();
  };

  const handleEdit = (item: Item) => {
    setForm({ name: item.name, description: item.description });
    setEditingId(item.id);
  };
  return (
    <div className="max-w-5xl mx-auto p-6">
      <h1 className="text-3xl font-bold mb-6 text-center">📝 CRUD Item App</h1>

      {/* Form Input */}
      <div className="mb-8 bg-white shadow-md rounded-lg p-6 space-y-4">
        <input type="text" placeholder="Item Name" value={form.name} onChange={(e) => setForm({ ...form, name: e.target.value })} className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <input
          type="text"
          placeholder="Description"
          value={form.description}
          onChange={(e) => setForm({ ...form, description: e.target.value })}
          className="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
        <button onClick={handleSubmit} className="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
          {editingId ? "Update Item" : "Add Item"}
        </button>
      </div>

      {/* Table Display */}
      <div className="overflow-x-auto">
        <table className="min-w-full table-auto border border-gray-200 shadow-sm rounded-lg overflow-hidden bg-white">
          <thead className="bg-gray-100 text-gray-700">
            <tr>
              <th className="px-4 py-2 border">ID</th>
              <th className="px-4 py-2 border">Item Name</th>
              <th className="px-4 py-2 border">Description</th>
              <th className="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            {items.map((item) => (
              <tr key={item.id} className="text-center hover:bg-gray-50">
                <td className="px-4 py-2 border">{item.id}</td>
                <td className="px-4 py-2 border font-medium">{item.name}</td>
                <td className="px-4 py-2 border">{item.description}</td>
                <td className="px-4 py-2 border space-x-2">
                  <button onClick={() => handleEdit(item)} className="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md">
                    Edit
                  </button>
                  <button onClick={() => handleDelete(item.id)} className="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md">
                    Delete
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}