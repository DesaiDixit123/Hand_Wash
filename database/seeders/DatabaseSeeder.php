<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\MarketArea;
use App\Models\TeamMember;
use App\Models\SeoSetting;
use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // 1. Seed Permissions
        $permissions = [
            ['name' => 'Manage Banners', 'slug' => 'manage_banners', 'description' => 'Create, edit, delete slides.'],
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', 'description' => 'Create, edit, delete categories.'],
            ['name' => 'Manage Products', 'slug' => 'manage_products', 'description' => 'Create, edit, delete products.'],
            ['name' => 'Manage Inquiries', 'slug' => 'manage_inquiries', 'description' => 'View and moderate inquiries.'],
            ['name' => 'Manage Blogs', 'slug' => 'manage_blogs', 'description' => 'Manage articles and blog categories.'],
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'description' => 'Update website settings and SEO tags.'],
            ['name' => 'Manage Gallery', 'slug' => 'manage_gallery', 'description' => 'Manage media gallery images.'],
            ['name' => 'Manage Team', 'slug' => 'manage_team', 'description' => 'Manage team members.'],
            ['name' => 'Manage Market Areas', 'slug' => 'manage_market_areas', 'description' => 'Manage network states.'],
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'description' => 'Manage system accounts.']
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(['slug' => $p['slug']], $p);
        }

        // 2. Seed Roles
        $adminRole = Role::firstOrCreate(['slug' => 'admin'], [
            'name' => 'Administrator',
            'description' => 'Full control over the system.'
        ]);

        $editorRole = Role::firstOrCreate(['slug' => 'editor'], [
            'name' => 'Content Editor',
            'description' => 'Can manage products, categories, blogs, and gallery.'
        ]);

        $adminRole->permissions()->sync(Permission::all());
        $editorRole->permissions()->sync(
            Permission::whereIn('slug', ['manage_banners', 'manage_categories', 'manage_products', 'manage_blogs', 'manage_gallery'])->get()
        );

        // 3. Default Admin
        User::firstOrCreate(['email' => 'Director@sreechemicals.com'], [
            'name' => 'Dimple Patel',
            'password' => Hash::make('AdminPassword123!'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now()
        ]);

        // 4. Website Settings
        $settings = [
            'company_name' => 'Sree Chemicals',
            'logo_path' => '/assets/images/logo.png',
            'email' => 'Director@sreechemicals.com',
            'phone' => '+91 87586 78787',
            'whatsapp' => '+91 87586 78787',
            'address' => '101, Chemical Zone, GIDC, Vadodara, Gujarat, India',
            'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118106.70010221617!2d73.1122241!3d22.3071588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ab91a3ddab%3A0xac39d3b311572119!2sVadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1717235282000!5m2!1sen!2sin',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'linkedin_url' => 'https://linkedin.com',
            'youtube_url' => 'https://youtube.com',
            'about_intro' => 'Sree Chemicals is a leading manufacturer of premium, industrial-grade and household cleaning products, dedicated to hygiene, safety, and sustainable environmental care.',
            'about_mission' => 'To deliver state-of-the-art cleaning solutions that ensure ultimate hygiene while maintaining eco-friendly formulations.',
            'about_vision' => 'To become the global standard in cleaning chemical manufacture, empowering homes and industries with premium quality products.',
            'about_experience' => '15+ Years of Excellence',
            'about_history' => 'Founded in 2011, Sree Chemicals operates a state-of-the-art automated manufacturing facility serving over 500+ dealers nationwide and supplying premium cleaning solutions to major industrial hubs.'
        ];

        foreach ($settings as $key => $val) {
            WebsiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // 5. Banners
        Banner::truncate();
        Banner::create([
            'title' => 'Industrial & Household Cleaning Solutions For Modern Businesses',
            'subtitle' => 'Professional cleaning chemicals and hygiene solutions manufactured with international quality standards.',
            'image_path' => '/assets/images/banner1.jpg',
            'button_text' => 'Explore Products',
            'button_link' => '/products',
            'sort_order' => 1,
            'status' => true
        ]);

        // 6. SEO Settings
        SeoSetting::truncate();
        $seoPages = [
            'home' => ['title' => 'Sree Chemicals - Premium Cleaning Products Manufacturer', 'desc' => 'Leading manufacturer of premium household hand washes, detergents, and industrial cleaning chemicals. Discover high-quality sanitation.'],
            'about' => ['title' => 'About Sree Chemicals - Leading Cleaner Manufacturer', 'desc' => 'Learn about Sree Chemicals history, vision, mission, state-of-the-art infrastructure, and quality assurance benchmarks.'],
            'products' => ['title' => 'Our Premium Cleaning Products Range - Sree Chemicals', 'desc' => 'Explore our complete list of cleaning chemicals: Hand Wash, Dish Wash, Liquid Detergents, Black/White Cleaners, and Industrial formulations.'],
            'gallery' => ['title' => 'Sree Chemicals Media Gallery - Factory, Products & Events', 'desc' => 'Browse photos of our advanced automated chemical manufacturing facility, quality laboratory, team members, and events.'],
            'market-area' => ['title' => 'Market Coverage & Dealer Network - Sree Chemicals', 'desc' => 'See our active dealer footprint and market area coverage across India. Interactive maps and state-wide dealer directory.'],
            'blog' => ['title' => 'Sree Chemicals Hygiene Blog - Sanitation Tips & Corporate News', 'desc' => 'Read our latest posts on home sanitization guidelines, industrial degreasing best practices, and new product launch announcements.'],
            'contact' => ['title' => 'Contact Sree Chemicals - Vadodara Office & Factory', 'desc' => 'Get in touch with Sree Chemicals for custom manufacturing, bulk orders, and queries. Call, email, or WhatsApp us.'],
            'dealer-registration' => ['title' => 'Become a Sree Chemicals Authorized Dealer - Apply Online', 'desc' => 'Register as an authorized retail dealer of Sree Chemicals Cleaning Products. High margins, exclusive rights, and sales support.'],
            'distributor-registration' => ['title' => 'Become a Sree Chemicals Distributor - Distribution Form', 'desc' => 'Apply to become a state/district level distributor. Join India\'s premier cleaning chemicals supply chain network.']
        ];

        foreach ($seoPages as $page => $data) {
            SeoSetting::create([
                'page_name' => $page,
                'meta_title' => $data['title'],
                'meta_description' => $data['desc'],
                'keywords' => 'hand wash, dish wash, cleaning chemicals manufacturer, floor cleaner, industrial chemicals, Vadodara chemicals',
                'canonical_url' => 'http://localhost/' . ($page === 'home' ? '' : $page),
                'og_image_path' => '/assets/images/og-image.jpg'
            ]);
        }

        // 7. Seed Categories
        Category::truncate();
        $categories = [
            ['name' => 'Hand Wash', 'slug' => 'hand-wash', 'desc' => 'Gentle on skin, tough on germs. Formulated with skin-nourishing moisturizers.', 'img' => '/assets/images/cat-handwash.jpg'],
            ['name' => 'Dish Wash', 'slug' => 'dish-wash', 'desc' => 'Advanced grease-cutting formula leaving utensils sparkling clean and odor-free.', 'img' => '/assets/images/cat-dishwash.jpg'],
            ['name' => 'Floor Cleaner', 'slug' => 'floor-cleaner', 'desc' => 'Gloss-enhancing, multi-surface disinfectant floor cleaner with long-lasting scent.', 'img' => '/assets/images/cat-floorcleaner.jpg'],
            ['name' => 'Glass Cleaner', 'slug' => 'glass-cleaner', 'desc' => 'Streak-free shining spray for windows, mirrors, car windscreens, and laminates.', 'img' => '/assets/images/cat-glasscleaner.jpg'],
            ['name' => 'Toilet Cleaner', 'slug' => 'toilet-cleaner', 'desc' => 'Deep scale-removing acidic formula that clings to bowl surfaces for deep sanitizing.', 'img' => '/assets/images/cat-toiletcleaner.jpg'],
            ['name' => 'Detergent Powder', 'slug' => 'detergent-powder', 'desc' => 'Heavy-duty cleaning powder for brilliant whites and deep stain removal.', 'img' => '/assets/images/cat-detpowder.jpg'],
            ['name' => 'Laundry Liquid', 'slug' => 'laundry-liquid', 'desc' => 'Concentrated laundry liquid that preserves fabric color and removes tough stains.', 'img' => '/assets/images/cat-liquiddet.jpg'],
            ['name' => 'Industrial Degreaser', 'slug' => 'industrial-degreaser', 'desc' => 'Heavy-duty degreasers, machinery cleaners, and sanitizers for factory floors and plants.', 'img' => '/assets/images/cat-industrial.jpg'],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[$cat['slug']] = Category::create([
                'name' => $cat['name'],
                'slug' => $cat['slug'],
                'short_description' => $cat['desc'],
                'image_path' => $cat['img']
            ]);
        }

        // 8. Seed Products
        Product::truncate();
        ProductImage::truncate();
        
        $productsSeed = [
            [
                'category_slug' => 'hand-wash',
                'name' => 'SoftShield Premium Hand Wash',
                'slug' => 'softshield-premium-hand-wash',
                'short' => 'Advanced germ protection combined with skin-conditioning moisturizers.',
                'desc' => 'SoftShield Premium Hand Wash is a pH-balanced, dermatologically tested formulation designed to eliminate 99.9% of harmful bacteria while keeping your hands soft, hydrated, and pleasantly scented. Formulated with Aloe Vera extract and Glycerin, it is perfect for frequent use in homes, offices, and commercial establishments.',
                'specs' => ['pH Level' => '5.5 - 6.5', 'Fragrance' => 'Aqua Fresh / Rose Garden', 'Form' => 'Thick Pearlescent Gel', 'Shelf Life' => '24 Months', 'Packaging' => '250ml Pump, 1L Refill, 5L Can'],
                'features' => ['Eliminates 99.9% of pathogens instantly', 'Dermatologically safe for sensitive skin', 'Rich lathering action', 'Rich in Aloe Vera & Vitamin E'],
                'benefits' => ['Keeps hands soft despite frequent washing', 'Pleasant lingering floral scent', 'Highly cost-effective in bulk 5L packaging', 'Non-toxic, eco-friendly ingredients'],
                'apps' => ['Residential kitchens and washrooms', 'Corporate office blocks and complexes', 'Hospitals and healthcare centers', 'Restaurants, cafes, and hotels']
            ],
            [
                'category_slug' => 'dish-wash',
                'name' => 'Sparkle Shine Dish Wash Liquid',
                'slug' => 'sparkle-shine-dish-wash-liquid',
                'short' => 'Ultra grease-cutting active lemon formulation for sparkling clean utensils.',
                'desc' => 'Sparkle Shine Dish Wash Liquid is an ultra-concentrated formula engineered with active lemon oil extracts to quickly dissolve heavy grease, burnt food, and oils from non-stick cookware, glassware, steel, and ceramic plates. A single spoonful is enough to clean an entire sink of utensils without leaving white scratch residues.',
                'specs' => ['Active Matter' => '15%', 'pH Level' => '6.5 - 7.5', 'Color' => 'Vibrant Green', 'Fragrance' => 'Zesty Lemon', 'Packaging' => '250ml, 500ml, 1L, 5L Can'],
                'features' => ['Fast grease dissolve action', 'Zero phosphate formulation', 'Gentle on hands, hard on stains', 'Rinses off completely without residue'],
                'benefits' => ['Restores sparkling shine to stainless steel and glass', 'Neutralizes bad food odors (fish, onion, garlic)', 'High concentration ensures longer usage', 'Safe for expensive non-stick coatings'],
                'apps' => ['Household kitchen washing', 'Commercial hotel pantries', 'Industrial food catering operations', 'School and hospital mess halls']
            ],
            [
                'category_slug' => 'floor-cleaner',
                'name' => 'CitrusGlow Floor Cleaner',
                'slug' => 'citrusglow-floor-cleaner',
                'short' => 'Disinfectant floor cleaner with 10x cleaning action and citrus aroma.',
                'desc' => 'CitrusGlow is a premium disinfectant floor cleaner that quickly cuts through grime, oily residues, and sticky stains. Formulated with surface-safe builders, it is suitable for marble, granite, ceramic tiles, mosaic, and laminated hardwood floors. It kills pathogens and leaves a beautiful long-lasting citrus fragrance.',
                'specs' => ['pH Level' => '7.0 - 8.0 (Neutral)', 'Sanitizing Agent' => 'Benzalkonium Chloride (BKC)', 'Form' => 'Liquid Concentrated Soluble', 'Fragrance' => 'Lemongrass & Citrus', 'Packaging' => '500ml, 1L, 5L, 20L Can'],
                'features' => ['Kills 99.9% germs (BKC active)', '10x superior soil lifting action', 'Dries quickly with zero streak marks', 'Surface safe - no harsh acids or bleaches'],
                'benefits' => ['Restores natural floor shine', 'Long lasting insect-repellent properties', 'Pleasant aromatherapy lemongrass odor', 'Safe for households with pets and children'],
                'apps' => ['Tiled residential floors', 'Large airport and hotel lobby tiling', 'Supermarket and retail showroom flooring', 'Hospital corridors']
            ],
            [
                'category_slug' => 'glass-cleaner',
                'name' => 'CrystalClear Glass Cleaner',
                'slug' => 'crystalclear-glass-cleaner',
                'short' => 'Streak-free shining spray for windows, mirrors, and laminates.',
                'desc' => 'CrystalClear Glass Cleaner is formulated with fast-evaporating cleaning agents that lift dust, fingerprints, grease, and smoke film from glass, mirror, vehicle windshields, and laminated corporate tables. It dries streak-free and restores high transparency gloss.',
                'specs' => ['Active Builders' => 'Isopropyl Alcohol base', 'pH Level' => '6.0 - 7.0', 'Form' => 'Clear Blue Spray Liquid', 'Packaging' => '500ml Spray, 5L Can'],
                'features' => ['Fast streak-free evaporation', 'Resists dust accumulation due to anti-static shield', 'Perfect for mirrors, windscreens, and display shelves'],
                'benefits' => ['Provides crystal clear visibility', 'Saves wiping time', 'Safe for automobile tinted glass'],
                'apps' => ['Glass facades & showroom window panes', 'Hotel lobbies and mirror structures', 'Home and vehicle detailing']
            ],
            [
                'category_slug' => 'toilet-cleaner',
                'name' => 'AcidFlush Ultra Toilet Cleaner',
                'slug' => 'acidflush-ultra-toilet-cleaner',
                'short' => 'Deep scale-removing acidic formula for ultimate toilet sanitizing.',
                'desc' => 'AcidFlush Ultra Toilet Cleaner is an advanced thick sanitizing formula that clings to the toilet bowl surface below the rim, dissolving stubborn limescale, yellow stains, and organic soils. It kills 99.9% of bacteria and leaves a fresh clean scent.',
                'specs' => ['pH Level' => '1.5 - 2.5 (Acidic)', 'Active Matter' => 'Hydrochloric Acid based', 'Form' => 'Thick Clinging Blue Liquid', 'Packaging' => '500ml, 1L, 5L Can'],
                'features' => ['Thick formula clings to bowl surfaces', 'Rapidly dissolves limescale and rust stains', 'Easy reach nozzles for under the rim application'],
                'benefits' => ['Restores sparkling white porcelain look', 'Deodorizes and leaves a fresh sanitizing aroma', 'Deep sanitizing action kills germs'],
                'apps' => ['Household ceramic toilet bowls', 'Office restroom urinal fittings', 'Hospital and hotel washrooms']
            ],
            [
                'category_slug' => 'detergent-powder',
                'name' => 'ActiveOxy Detergent Powder',
                'slug' => 'activeoxy-detergent-powder',
                'short' => 'Heavy-duty cleaning powder for brilliant whites and deep stain removal.',
                'desc' => 'ActiveOxy Detergent Powder features oxygen-bleach builders and multi-enzymes to penetrate deep into fabric fibers, lifting stubborn dirt, grass stains, grease, and sweat marks. Safe for white and colored clothes, it ensures a long-lasting fresh fragrance.',
                'specs' => ['Active Matter' => '12%', 'Form' => 'Granular Powder with blue active particles', 'Fragrance' => 'Fresh Lemon & Lavender', 'Packaging' => '1kg Pack, 5kg Bag, 25kg Bulk Bag'],
                'features' => ['Active oxygen-bleach technology', 'Multi-enzyme stain dissolving system', 'Low foam formula suitable for machine washes'],
                'benefits' => ['Brightens whites and preserves colored fabrics', 'Leaves a lingering clean scent', 'Fights tough collar and cuff dirt'],
                'apps' => ['Household laundry washing', 'Hospital bedsheet laundering units', 'Hotel linen washing departments']
            ],
            [
                'category_slug' => 'laundry-liquid',
                'name' => 'UltraClean Laundry Liquid',
                'slug' => 'ultraclean-laundry-liquid',
                'short' => 'Concentrated laundry liquid that preserves fabric color and removes tough stains.',
                'desc' => 'UltraClean Laundry Liquid is a high-solubility concentrated liquid detergent designed to dissolve quickly in both hot and cold water. It removes stubborn grease, mud, and drink stains without leaving powdery residues on dark fabrics. Formulated with fabric conditioners, it keeps clothes soft.',
                'specs' => ['pH Level' => '7.5 - 8.5', 'Active Matter' => '18%', 'Form' => 'Viscous Blue Fluid', 'Packaging' => '1L Bottle, 5L Can'],
                'features' => ['Fast dissolve action with zero residues', 'Built-in fabric softener molecules', 'Dermatologically safe formulation'],
                'benefits' => ['Prevents color fading and fabric wear', 'Excellent for automatic washing machines', 'Highly cost-effective per wash load'],
                'apps' => ['Automatic front/top load washing machines', 'Hand wash delicate fabrics', 'Commercial laundry plants']
            ],
            [
                'category_slug' => 'industrial-degreaser',
                'name' => 'IndusDegrease Heavy Duty Degreaser',
                'slug' => 'indusdegrease-heavy-duty-degreaser',
                'short' => 'Concentrated industrial alkaline degreaser for machinery and shopfloors.',
                'desc' => 'IndusDegrease is a heavy-duty, water-soluble alkaline degreaser designed to penetrate and emulsify stubborn deposits of grease, heavy oils, tar, carbon black, and wax. Formulated with advanced surfactants and corrosion inhibitors, it is perfect for cleaning machinery, engine blocks, factory floors, and garage surfaces without damaging metals.',
                'specs' => ['pH Level' => '12.0 - 13.5 (Highly Alkaline)', 'Specific Gravity' => '1.05', 'Solubility' => '100% Water Soluble', 'Packaging' => '5L, 20L, 50L, 200L Barrel'],
                'features' => ['Industrial grade high alkalinity', 'Contains rust and corrosion inhibitors', 'Rapidly emulsifies mineral oils and grease', 'Low foaming action suitable for scrubber machines'],
                'benefits' => ['Safe on steel, iron, and concrete surfaces', 'Saves manual scrubbing labor and time', 'Dilutable up to 1:50 for light cleaning duties', 'Removes tough grease tracks easily'],
                'apps' => ['Automotive garages and service hubs', 'CNC machining workshops', 'Manufacturing assembly lines', 'Petrochemical and metallurgical plants']
            ]
        ];

        foreach ($productsSeed as $p) {
            $cat = $catModels[$p['category_slug']] ?? null;
            if ($cat) {
                $prod = Product::create([
                    'category_id' => $cat->id,
                    'name' => $p['name'],
                    'slug' => $p['slug'],
                    'short_description' => $p['short'],
                    'description' => $p['desc'],
                    'specifications' => $p['specs'],
                    'features' => $p['features'],
                    'benefits' => $p['benefits'],
                    'applications' => $p['apps'],
                    'brochure_path' => null,
                    'status' => true
                ]);

                // Create primary image
                ProductImage::create([
                    'product_id' => $prod->id,
                    'image_path' => '/uploads/products/' . $p['slug'] . '.jpg',
                    'is_primary' => true
                ]);
            }
        }

        // 9. Seed Testimonials
        Testimonial::truncate();
        Testimonial::create([
            'client_name' => 'Rajesh Sharma',
            'designation' => 'Procurement Manager, Hotel Blue Diamond',
            'review' => 'We have been sourcing Dish Wash Liquid and Floor Cleaners from Sree Chemicals for the last 3 years. The consistency in quality is remarkable, and their bulk prices have helped us optimize our housekeeping costs significantly.',
            'client_image' => '/assets/images/user1.jpg',
            'rating' => 5
        ]);
        Testimonial::create([
            'client_name' => 'Ananya Patel',
            'designation' => 'Distributor, Patel Enterprises',
            'review' => 'As a district distributor, I appreciate Sree Chemicals\' timely delivery and excellent promotional support. Their products, especially the PineFresh White Phenyl, have become household favorites in our market.',
            'client_image' => '/assets/images/user2.jpg',
            'rating' => 5
        ]);

        // 10. Seed FAQs
        Faq::truncate();
        Faq::create([
            'question' => 'Do you manufacture eco-friendly and biodegradable cleaning products?',
            'answer' => 'Yes, all our household cleaning products (including hand washes and detergents) are formulated using biodegradable surfactants and organic active ingredients that do not pollute waterways. They are free from phosphates, parabens, and nonylphenol.',
            'sort_order' => 1
        ]);
        Faq::create([
            'question' => 'What is the minimum order quantity (MOQ) for dealer/distributor supply?',
            'answer' => 'For authorized dealerships, our minimum starting order is ₹50,000, and for exclusive district distributorships, the initial order value begins at ₹2,00,000. Full details are sent upon reviewing your registration request.',
            'sort_order' => 2
        ]);
        Faq::create([
            'question' => 'Do you provide material safety data sheets (MSDS) for industrial cleaning chemicals?',
            'answer' => 'Yes, we provide comprehensive MSDS and Technical Data Sheets (TDS) for all our industrial degreasers, solvents, and manufacturing floor chemicals. These can be downloaded from the product detail page or obtained via email.',
            'sort_order' => 3
        ]);

        // 11. Blog Categories & Blogs
        BlogCategory::truncate();
        Blog::truncate();
        $bcat = BlogCategory::create([
            'name' => 'Sanitation & Hygiene',
            'slug' => 'sanitation-hygiene'
        ]);
        $bcat2 = BlogCategory::create([
            'name' => 'Industrial Safety',
            'slug' => 'industrial-safety'
        ]);

        Blog::create([
            'blog_category_id' => $bcat->id,
            'title' => 'Benefits of Liquid Detergent vs. Powder Detergent',
            'slug' => 'benefits-liquid-detergent-vs-powder',
            'content' => '<p>Learn why modern commercial laundromats and households are transitioning to liquid detergents. Liquid detergents dissolve fully at any water temperature, leave zero chalky residue on dark clothes, and are pre-dissolved for immediate deep stain action.</p>',
            'image_path' => '/assets/images/blog1.jpg',
            'author_name' => 'Dr. Amit Trivedi (Head Chemist)',
            'status' => true,
            'published_at' => now()->subDays(5)
        ]);

        Blog::create([
            'blog_category_id' => $bcat2->id,
            'title' => 'Industrial Cleaning Best Practices in Automotive Workshops',
            'slug' => 'industrial-cleaning-best-practices-workshops',
            'content' => '<p>Automotive service floors require specialized cleaning formulations to break down thick deposits of mineral oils, gear greases, and tire grit safely. We review the dilution protocols and safety standards for handling alkaline industrial degreasers.</p>',
            'image_path' => '/assets/images/blog2.jpg',
            'author_name' => 'Prakash Mehta (Plant Operator)',
            'status' => true,
            'published_at' => now()->subDays(10)
        ]);

        // 12. Seed Gallery
        Gallery::truncate();
        Gallery::create(['title' => 'Automated Liquid Filling Line', 'image_path' => '/assets/images/gallery/factory-filling.jpg', 'type' => 'factory']);
        Gallery::create(['title' => 'Quality Control Chemical Lab', 'image_path' => '/assets/images/gallery/factory-lab.jpg', 'type' => 'factory']);
        Gallery::create(['title' => 'Product Batch 104 Packaging', 'image_path' => '/assets/images/gallery/product-pkg.jpg', 'type' => 'product']);
        Gallery::create(['title' => 'Our Core Research Team', 'image_path' => '/assets/images/gallery/team-rnd.jpg', 'type' => 'team']);
        Gallery::create(['title' => 'Annual Industry Chem Exhibition 2025', 'image_path' => '/assets/images/gallery/event-expo.jpg', 'type' => 'event']);

        // 13. Seed Market Areas
        MarketArea::truncate();
        MarketArea::create(['state' => 'Gujarat', 'city' => 'Vadodara', 'dealer_count' => 105, 'details' => 'HQ and Main Formulation Plant. 105 authorized retail dealer outlets and 2 central inventory warehouses.']);
        MarketArea::create(['state' => 'Maharashtra', 'city' => 'Mumbai', 'dealer_count' => 85, 'details' => 'Regional Supply Hub. 85 active dealers and 8 primary wholesale stockists.']);
        MarketArea::create(['state' => 'Delhi', 'city' => 'New Delhi', 'dealer_count' => 50, 'details' => 'North India corporate supply hub. 50 retail dealers.']);
        MarketArea::create(['state' => 'Karnataka', 'city' => 'Bengaluru', 'dealer_count' => 40, 'details' => 'South India warehousing partner. 40 dealers.']);
        MarketArea::create(['state' => 'Rajasthan', 'city' => 'Jaipur', 'dealer_count' => 30, 'details' => 'Semi-urban retail network. 30 dealers.']);

        // 14. Seed Team Members
        TeamMember::truncate();
        TeamMember::create([
            'name' => 'Suresh V. Desai',
            'designation' => 'Founder & Managing Director',
            'image_path' => '/assets/images/team-suresh.jpg',
            'bio' => 'Suresh has over 30 years of industrial experience in chemical formulations.',
            'linkedin_url' => 'https://linkedin.com',
            'sort_order' => 1
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
