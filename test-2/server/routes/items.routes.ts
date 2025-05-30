import express from "express";
import { db } from "../database";
import { items } from "../database/schema";
import { eq } from "drizzle-orm";

const router = express.Router();

router.get("/", async (_, res) => {
  const result = await db.select().from(items);
  res.json(result);
});

router.post("/", async (req, res) => {
  const { name, description } = req.body;
  const result = await db.insert(items).values({ name, description }).returning();
  res.json(result);
});

router.put("/:id", async (req, res) => {
  const id = parseInt(req.params.id);
  const { name, description } = req.body;
  const result = await db.update(items).set({ name, description }).where(eq(items.id, id)).returning();
  res.json(result);
});

router.delete("/:id", async (req, res) => {
  const id = parseInt(req.params.id);
  const result = await db.delete(items).where(eq(items.id, id)).returning();
  res.json(result);
});

export default router;
