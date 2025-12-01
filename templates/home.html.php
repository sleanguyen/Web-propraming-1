<style>
    /* Hero Section (Introduction) */
    .hero-section {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 40px;
        text-align: center;
    }
    
    .hero-content {
        padding: 40px 20px;
    }

    .hero-title {
        color: #1e3a8a; /* Greenwich Blue */
        font-size: 2.5em;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .hero-subtitle {
        color: #555;
        font-size: 1.2em;
        margin-bottom: 30px;
    }

    .hero-image img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
    }

    /* Stats Grid (Rankings) */
    .stats-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        background-color: #f8f9fa;
        border-top: 1px solid #eee;
    }

    .stat-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        width: 200px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .stat-number {
        font-size: 1.5em;
        font-weight: bold;
        color: #d32f2f; /* Red for emphasis */
        display: block;
        margin-bottom: 5px;
    }

    /* Event Section */
    .section-title {
        text-align: center;
        font-size: 2em;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #3cbc8d;
        display: inline-block;
        padding-bottom: 5px;
    }

    .event-container {
        display: flex;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 0 auto;
    }

    .event-img {
        flex: 1;
    }
    .event-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .event-details {
        flex: 1;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .event-tag {
        background-color: #1e3a8a;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8em;
        width: fit-content;
        margin-bottom: 15px;
    }

    .event-name {
        font-size: 1.8em;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .event-info {
        font-size: 1em;
        color: #666;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .btn-join {
        display: inline-block;
        margin-top: 20px;
        background-color: #3cbc8d;
        color: white;
        padding: 10px 25px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        width: fit-content;
    }
    .btn-join:hover { background-color: #2ea379; }

</style>

<div class="hero-section">
    <div class="hero-image">
        <img src="images/event_banner.jpg" alt="University of Greenwich Campus">
    </div>
    
    <div class="hero-content">
        <h1 class="hero-title">University of Greenwich</h1>
        <p class="hero-subtitle">Alliance with FPT Education - Change Life, Change Society</p>
        
        <div class="stats-container">
            <div class="stat-card">
                <span class="stat-number">#1</span>
                Best University in London (StudentCrowd)
            </div>
            <div class="stat-card">
                <span class="stat-number">#86</span>
                THE Impact Rankings 2024
            </div>
            <div class="stat-card">
                <span class="stat-number">TOP 501-600</span>
                World University Rankings
            </div>
            <div class="stat-card">
                <span class="stat-number">TOP 1</span>
                International Students in London
            </div>
        </div>
    </div>
</div>

<div style="text-align: center; margin-top: 50px;">
    <h2 class="section-title">Upcoming Events</h2>
</div>

<div class="event-container">
    <div class="event-img">
        <img src="images/school_intro.jpg" alt="Student Honoring Ceremony">
    </div>
    
    <div class="event-details">
        <span class="event-tag">Summer 2025 Trimester</span>
        
        <h3 class="event-name">Student Honoring Ceremony</h3>
        
        <p class="event-info">
            📅 <strong>Date:</strong> 11.11.2025
        </p>
        <p class="event-info">
            ⏰ <strong>Time:</strong> 6:00 PM
        </p>
        <p class="event-info">
            📍 <strong>Location:</strong> Hall G215 | Hanoi Campus
        </p>
        <p class="event-info">
            🌟 <strong>Hashtag:</strong> #Honoring, #Event
        </p>
        <a href="questions.php" class="btn-join">Join Discussion</a>
    </div>
</div>