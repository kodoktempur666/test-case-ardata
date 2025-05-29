import { useEffect, useState } from "react";
import axios from "axios";
import "../index.css"; // pastikan ini di-import jika belum

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
    <div className="container">
      <h1>CRUD Item</h1>
      <div className="form">
        <input
          placeholder="Name"
          value={form.name}
          onChange={(e) => setForm({ ...form, name: e.target.value })}
        />
        <input
          placeholder="Description"
          value={form.description}
          onChange={(e) => setForm({ ...form, description: e.target.value })}
        />
        <button onClick={handleSubmit}>
          {editingId ? "Update" : "Add"}
        </button>
      </div>

      <ul className="item-list">
        {items.map((item) => (
          <li key={item.id} className="item">
            <div>
              <strong>{item.name}</strong>: {item.description}
            </div>
            <div className="actions">
              <button onClick={() => handleEdit(item)}>Edit</button>
              <button onClick={() => handleDelete(item.id)}>Delete</button>
            </div>
          </li>
        ))}
      </ul>
    </div>
  );
}
