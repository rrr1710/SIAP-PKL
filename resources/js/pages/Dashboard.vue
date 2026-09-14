<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'

defineProps<{
  auth: {
    user: {
      name: string
      email: string
      avatar: string
    }
    roles: string[]
  }
}>()

const logout = () => {
  router.post('/logout')
}
</script>

<template>
  <Head title="Dashboard - SIAP-PKL" />

  <div class="min-h-screen bg-background p-8">
    <div class="mx-auto max-w-4xl space-y-6">
      <div class="flex items-center justify-between border-b pb-4">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <Button variant="destructive" @click="logout">Logout</Button>
      </div>

      <div class="flex items-center gap-4 rounded-lg border p-6 bg-card">
        <img 
          :src="auth.user.avatar" 
          :alt="auth.user.name" 
          class="h-16 w-16 rounded-full border"
        />
        <div>
          <h2 class="text-xl font-semibold">{{ auth.user.name }}</h2>
          <p class="text-sm text-muted-foreground">{{ auth.user.email }}</p>
          <div class="mt-2 flex gap-2">
            <span 
              v-for="role in auth.roles" 
              :key="role" 
              class="rounded-md bg-primary/10 px-2 py-1 text-xs font-medium text-primary"
            >
              {{ role }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>